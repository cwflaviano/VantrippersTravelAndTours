// select_customer.js

$(function() {
  let customerTable;

  // Initialize or reload DataTable on modal open
  $('#customerModal').on('show.bs.modal', function() {
      if (!$.fn.DataTable.isDataTable('#customersTable')) {
          customerTable = $('#customersTable').DataTable({
              processing: true,
              serverSide: true,
              ajax: '../admin/server_customer.php',
              columns: [
                  {
                      data: 'id',
                      orderable: false,
                      render: function(id, type, row) {
                          return `
                              <input type="checkbox" name="customer_select" value="${id}"
                                  data-name="${row.name}"
                                  data-email="${row.email}"
                                  data-contact="${row.contact}"
                                  data-street1="${row.street1}"
                                  data-street2="${row.street2}"
                                  data-city="${row.city}"
                                  data-state="${row.state}"
                                  data-zip="${row.zip}"
                                  data-country="${row.country}">
                          `;
                      }
                  },
                  { data: 'name'    },
                  { data: 'email'    },
                  { data: 'contact'    },
                  { data: 'street1' },
                  { data: 'street2' },
                  { data: 'city'    },
                  { data: 'state'   },
                  { data: 'zip'     },
                  { data: 'country' }
              ],
              order: [[1, 'asc']],
              pageLength: 5,
              lengthMenu: [5, 10, 25]
          });
      } else {
          customerTable.ajax.reload(null, false);
      }
  });

  // Single-select behavior: when any checkbox changes, uncheck others
  $('#customersTable').on('change', 'input[name="customer_select"]', function() {
      $('#customersTable input[name="customer_select"]').not(this).prop('checked', false);
  });

  // Row click toggles the checkbox
  $('#customersTable').on('click', 'tbody tr', function(e) {
      // ignore if user clicked directly on checkbox
      if ($(e.target).is('input[name="customer_select"]')) {
          return;
      }
      const checkbox = $(this).find('input[name="customer_select"]');
      if (checkbox.length) {
          checkbox.prop('checked', true).trigger('change');
      }
  });

  // Handle "Use Selected" button
  $('#confirmCustomer').on('click', function() {
      const sel = $('#customerModal').find('input[name="customer_select"]:checked');
      if (!sel.length) {
          // No selection: silently return
          return;
      }

      // Fill form fields
      $('#customer_name').val(sel.data('name'));
      $('#email').val(sel.data('email'));
      $('#contact').val(sel.data('contact'));
      $('#address_street1').val(sel.data('street1'));
      $('#address_street2').val(sel.data('street2'));
      $('#address_city').val(sel.data('city'));
      $('#address_state').val(sel.data('state'));
      $('#address_zip').val(sel.data('zip'));
      $('#address_country').val(sel.data('country'));

      // Show hidden address block
      $('#addressFields').slideDown();

      // Close modal
      $('#customerModal').modal('hide');
  });
});
