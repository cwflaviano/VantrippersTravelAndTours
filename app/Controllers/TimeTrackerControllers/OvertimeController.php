<?php

namespace App\Controllers\TimeTrackerControllers;

use App\Controllers\BaseController;

class OvertimeController extends BaseController
{
    // Constants for overtime rules
    private $MAX_DAILY_HOURS = 24;
    private $MAX_WEEKLY_HOURS = 168;
    private $STANDARD_WORK_HOURS = 8;
    private $DOUBLE_TIME_THRESHOLD = 12;
    private $MINUTE_INCREMENTS = 15;

    /**
     * Handle overtime calculation and update
     */
    public function calculate_overtime()
    {
        // Set the default content type to JSON
        $this->response->setContentType('application/json');

        try {
            $logId = $this->request->getPost('log_id');
            if (empty($logId)) {
                $this->response->setStatusCode(400);
                return $this->response->setJSON(['success' => false, 'message' => 'Log ID is required']);
            }

            $extraHours = $this->request->getPost('extra_hours') ?? 0;
            $extraMinutes = $this->request->getPost('extra_minutes') ?? 0;
            $doubleHours = $this->request->getPost('double_hours') ?? 0;
            $doubleMinutes = $this->request->getPost('double_minutes') ?? 0;

            $extraTotal = $this->hoursMinutesToDecimal($extraHours, $extraMinutes);
            $doubleTotal = $this->hoursMinutesToDecimal($doubleHours, $doubleMinutes);

            $validation = $this->validateOvertimeHours(
                ['hours' => $extraHours, 'minutes' => $extraMinutes],
                ['hours' => $doubleHours, 'minutes' => $doubleMinutes],
                0
            );

            if (!$validation['valid']) {
                $this->response->setStatusCode(400);
                return $this->response->setJSON(['success' => false, 'message' => implode(', ', $validation['errors'])]);
            }

            $db = \Config\Database::connect();
            $data = [
                'extra_hours' => $extraTotal,
                'double_hours' => $doubleTotal,
                'updated_at' => date('Y-m-d H:i:s') // 01:09 PM PST, June 05, 2025
            ];

            // Check if the record exists
            $existingLog = $db->table('time_logs')->where('log_id', $logId)->get()->getRow();
            if (!$existingLog) {
                $this->response->setStatusCode(404);
                return $this->response->setJSON(['success' => false, 'message' => 'Log ID not found']);
            }

            $db->table('time_logs')->where('log_id', $logId)->update($data);
            if ($db->affectedRows() === 0) {
                $this->response->setStatusCode(400);
                return $this->response->setJSON(['success' => false, 'message' => 'No changes made to overtime']);
            }

            $totalHours = $this->calculateTotalHours(0, $extraTotal, $doubleTotal);
            $this->response->setStatusCode(200);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Overtime updated successfully',
                'total_hours' => $this->formatHoursMinutes($totalHours)
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Overtime update failed: ' . $e->getMessage());
            $this->response->setStatusCode(500);
            return $this->response->setJSON(['success' => false, 'message' => 'An unexpected error occurred']);
        }
    }

    private function hoursMinutesToDecimal($hours, $minutes)
    {
        $hours = intval($hours ?? 0);
        $minutes = intval($minutes ?? 0);
        $minutes = round($minutes / $this->MINUTE_INCREMENTS) * $this->MINUTE_INCREMENTS;
        return $hours + ($minutes / 60);
    }

    private function decimalToHoursMinutes($decimalHours)
    {
        $decimalHours = floatval($decimalHours ?? 0);
        $hours = floor($decimalHours);
        $minutes = round(($decimalHours - $hours) * 60);
        return [
            'hours' => $hours,
            'minutes' => $minutes,
            'total_minutes' => ($hours * 60) + $minutes
        ];
    }

    private function formatHours($decimalHours, $includeMinutes = true)
    {
        if ($decimalHours === null || $decimalHours <= 0) return '-';
        $time = $this->decimalToHoursMinutes($decimalHours);
        if (!$includeMinutes || $time['minutes'] == 0) {
            return $time['hours'] . 'h';
        }
        if ($time['hours'] == 0) {
            return $time['minutes'] . 'm';
        }
        return $time['hours'] . 'h ' . $time['minutes'] . 'm';
    }

    private function formatHoursMinutes($decimalHours)
    {
        if ($decimalHours === null || $decimalHours <= 0) return '-';
        $time = $this->decimalToHoursMinutes($decimalHours);
        return sprintf("%d hrs %02d mins", $time['hours'], $time['minutes']);
    }

    private function calculateTotalHours($regularHours, $extraHours, $doubleHours)
    {
        $regularHours = floatval($regularHours ?? 0);
        $extraHours = floatval($extraHours ?? 0);
        $doubleHours = floatval($doubleHours ?? 0);
        return $regularHours + $extraHours + ($doubleHours * 2);
    }

    private function validateOvertimeHours($extraHours, $doubleHours, $regularHours = 0)
    {
        $errors = [];
        if (is_array($extraHours)) {
            $extraHours = $this->hoursMinutesToDecimal($extraHours['hours'] ?? 0, $extraHours['minutes'] ?? 0);
        }
        if (is_array($doubleHours)) {
            $doubleHours = $this->hoursMinutesToDecimal($doubleHours['hours'] ?? 0, $doubleHours['minutes'] ?? 0);
        }
        $extraHours = floatval($extraHours ?? 0);
        $doubleHours = floatval($doubleHours ?? 0);
        $regularHours = floatval($regularHours ?? 0);

        if ($extraHours < 0) $errors[] = "Extra hours cannot be negative";
        if ($doubleHours < 0) $errors[] = "Double hours cannot be negative";
        if ($extraHours > $this->MAX_DAILY_HOURS) $errors[] = "Extra hours cannot exceed " . $this->MAX_DAILY_HOURS . " hours";
        if ($doubleHours > $this->MAX_DAILY_HOURS) $errors[] = "Double hours cannot exceed " . $this->MAX_DAILY_HOURS . " hours";
        $totalDailyHours = $regularHours + $extraHours + $doubleHours;
        if ($totalDailyHours > $this->MAX_DAILY_HOURS) $errors[] = "Total daily hours cannot exceed " . $this->MAX_DAILY_HOURS . " hours";
        if ($totalDailyHours > 16) $errors[] = "Total daily hours exceeds reasonable limit of 16 hours";
        $extraMinutes = ($extraHours * 60) % 60;
        $doubleMinutes = ($doubleHours * 60) % 60;
        if ($extraMinutes % $this->MINUTE_INCREMENTS !== 0) $errors[] = "Extra hours must be in " . $this->MINUTE_INCREMENTS . "-minute increments";
        if ($doubleMinutes % $this->MINUTE_INCREMENTS !== 0) $errors[] = "Double hours must be in " . $this->MINUTE_INCREMENTS . "-minute increments";

        return [
            'valid' => empty($errors),
            'errors' => $errors,
            'total_hours' => $totalDailyHours,
            'breakdown' => [
                'regular' => $this->decimalToHoursMinutes($regularHours),
                'extra' => $this->decimalToHoursMinutes($extraHours),
                'double' => $this->decimalToHoursMinutes($doubleHours),
                'total' => $this->decimalToHoursMinutes($totalDailyHours)
            ]
        ];
    }
}