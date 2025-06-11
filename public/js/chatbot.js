/**
 * Vantrippers Travel Chatbot - Optimized Version
 * Separate JavaScript file for better organization
 */

// FAQ Data from PHP (will be set globally)
let travelFAQs = window.travelFAQs || [];

// Travel-related keywords for filtering
const travelKeywords = [
    'tour', 'travel', 'trip', 'vacation', 'holiday', 'destination', 'package', 'booking', 'book',
    'price', 'cost', 'fee', 'payment', 'discount', 'promo', 'accommodation', 'hotel', 'resort',
    'transport', 'van', 'bus', 'flight', 'guide', 'safe', 'safety', 'insurance', 'contact',
    'visit', 'explore', 'adventure', 'activity', 'itinerary', 'schedule', 'duration', 'include',
    'palawan', 'boracay', 'bohol', 'siargao', 'baguio', 'manila', 'cebu', 'davao', 'philippines',
    'beach', 'island', 'mountain', 'city', 'culture', 'food', 'diving', 'snorkeling', 'hiking',
    'vantrippers', 'group', 'solo', 'family', 'couple', 'student', 'senior'
];

// Chatbot Configuration
const chatbotConfig = {
    welcomeMessages: [
        "Hi there! I'm your Vantrippers travel assistant. I can help you plan the perfect Philippines adventure!",
        "Welcome to Vantrippers! Ready to discover amazing destinations? Ask me anything about our tours!",
        "Hello! I'm here to help you explore the beautiful Philippines. What would you like to know?"
    ],
    fallbackResponses: [
        "That's an interesting question! I specialize in travel-related inquiries. Could you ask about our tours, destinations, or travel services?",
        "I'm your travel assistant, so I'm best at helping with trip planning and travel questions. What would you like to know about our tours?",
        "Let me help you with travel-related questions! Ask me about destinations, prices, bookings, or anything about exploring the Philippines."
    ],
    nonTravelResponse: "I'm specifically designed to help with travel questions about Vantrippers tours and Philippines destinations. How can I assist you with planning your next adventure?",
    noResultsResponse: "I don't have that specific information right now, but our travel experts would love to help! Contact us at +63 123 456 7890 or message us on Facebook for personalized assistance.",
    typingDelay: 1200,
    responseDelay: 500
};

// Initialize chatbot when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeTravelAssistant();
    setupInputBehavior();
    checkScrollPosition();
    window.addEventListener('scroll', checkScrollPosition);
    window.addEventListener('resize', checkScrollPosition);
});

// Initialize the travel assistant
function initializeTravelAssistant() {
    const welcomeMessage = chatbotConfig.welcomeMessages[
        Math.floor(Math.random() * chatbotConfig.welcomeMessages.length)
    ];
    
    addMessage(welcomeMessage, 'assistant');
    
    setTimeout(() => {
        addMessage("Try asking about our popular destinations, tour packages, or booking process!", 'assistant');
        updateSuggestions();
    }, 1500);
}

// Setup input behavior
function setupInputBehavior() {
    const userInput = document.getElementById('userInput');
    const suggestedQuestions = document.getElementById('suggestedQuestions');
    
    if (!userInput) return;
    
    userInput.addEventListener('focus', () => {
        if (suggestedQuestions) {
            suggestedQuestions.style.display = 'block';
            setTimeout(() => {
                suggestedQuestions.classList.add('show');
            }, 10);
            updateSuggestions();
        }
    });
    
    userInput.addEventListener('blur', () => {
        if (suggestedQuestions) {
            setTimeout(() => {
                suggestedQuestions.classList.remove('show');
                setTimeout(() => {
                    suggestedQuestions.style.display = 'none';
                }, 300);
            }, 200);
        }
    });

    // Update suggestions as user types
    userInput.addEventListener('input', updateSuggestions);
    
    // Enter key handling
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(e);
        }
    });
}

// Update suggestions based on input and available FAQs
function updateSuggestions() {
    const userInput = document.getElementById('userInput');
    const suggestionsList = document.getElementById('suggestionsList');
    
    if (!userInput || !suggestionsList) return;
    
    const input = userInput.value.toLowerCase().trim();
    let suggestions = [];
    
    if (input.length > 2) {
        // Find relevant FAQs based on input
        suggestions = travelFAQs
            .filter(faq => faq.question.toLowerCase().includes(input))
            .slice(0, 4)
            .map(faq => faq.question);
    } else {
        // Show popular travel questions
        const popularQuestions = [
            "What destinations do you offer?",
            "How much do tours cost?",
            "How do I book a trip?",
            "Are your tours safe?",
            "What's included in packages?",
            "Do you offer group discounts?"
        ];
        
        suggestions = popularQuestions
            .sort(() => 0.5 - Math.random())
            .slice(0, 4);
    }
    
    suggestionsList.innerHTML = suggestions
        .map(suggestion => `
            <button class="suggestion-item" onclick="selectSuggestion('${suggestion.replace(/'/g, "\\'")}')">
                <i class="fas fa-search"></i>
                ${suggestion}
            </button>
        `).join('');
}

// Select a suggestion
function selectSuggestion(suggestion) {
    const userInput = document.getElementById('userInput');
    if (userInput) {
        userInput.value = suggestion;
        sendMessage({ preventDefault: () => {} });
    }
}

// Add message to chat
function addMessage(content, sender, showFeedback = false) {
    const chatMessages = document.getElementById('chatMessages');
    if (!chatMessages) return;
    
    // Remove typing indicator
    const existingTyping = chatMessages.querySelector('.typing-indicator');
    if (existingTyping) {
        existingTyping.remove();
    }
    
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${sender}-message`;
    
    const messageContent = document.createElement('div');
    messageContent.className = 'message-content';
    messageContent.innerHTML = formatMessage(content);
    messageDiv.appendChild(messageContent);
    
    // Add feedback for assistant messages
    if (sender === 'assistant' && showFeedback && !content.includes("Try asking")) {
        const feedbackDiv = document.createElement('div');
        feedbackDiv.className = 'message-feedback';
        feedbackDiv.innerHTML = `
            <span class="feedback-text">Was this helpful?</span>
            <button class="feedback-btn helpful" onclick="submitFeedback(this, true)">
                <i class="fas fa-thumbs-up"></i>
            </button>
            <button class="feedback-btn not-helpful" onclick="submitFeedback(this, false)">
                <i class="fas fa-thumbs-down"></i>
            </button>
        `;
        messageDiv.appendChild(feedbackDiv);
    }
    
    chatMessages.appendChild(messageDiv);
    messageDiv.scrollIntoView({ behavior: 'smooth', block: 'end' });
}

// Format message content
function formatMessage(content) {
    return content
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\*(.*?)\*/g, '<em>$1</em>')
        .replace(/\n/g, '<br>')
        .replace(/(\+63 \d{3} \d{3} \d{4})/g, '<a href="tel:$1" class="text-decoration-none">$1</a>')
        .replace(/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/g, '<a href="mailto:$1" class="text-decoration-none">$1</a>');
}

// Show typing indicator
function showTypingIndicator() {
    const chatMessages = document.getElementById('chatMessages');
    if (!chatMessages) return;
    
    // Remove any existing typing indicator
    const existingTyping = chatMessages.querySelector('.typing-indicator');
    if (existingTyping) {
        existingTyping.remove();
    }
    
    const typingDiv = document.createElement('div');
    typingDiv.className = 'typing-indicator';
    typingDiv.innerHTML = `
        <div class="typing-dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <span>Assistant is thinking...</span>
    `;
    
    chatMessages.appendChild(typingDiv);
    typingDiv.scrollIntoView({ behavior: 'smooth', block: 'end' });
}

// Check if question is travel-related
function isTravelRelated(question) {
    const lowercaseQuestion = question.toLowerCase();
    
    // Always allow questions with "vantrippers" in them
    if (lowercaseQuestion.includes('vantrippers')) {
        return true;
    }
    
    return travelKeywords.some(keyword => lowercaseQuestion.includes(keyword));
}

// Find best matching FAQ
function findBestTravelAnswer(question) {
    if (!isTravelRelated(question)) {
        return null;
    }

    const lowercaseQuestion = question.toLowerCase();
    
    // Try exact match first
    const exactMatch = travelFAQs.find(faq => 
        faq.question.toLowerCase() === lowercaseQuestion
    );
    if (exactMatch) return exactMatch;
    
    // Try keyword matching with scoring
    const keywords = lowercaseQuestion.split(/\s+/).filter(word => word.length > 2);
    const scoredFAQs = travelFAQs.map(faq => {
        const faqQuestion = faq.question.toLowerCase();
        const faqAnswer = faq.answer.toLowerCase();
        
        let score = 0;
        keywords.forEach(keyword => {
            // Higher weight for matches in question
            const questionMatches = (faqQuestion.match(new RegExp(keyword, 'g')) || []).length;
            score += questionMatches * 3;
            
            // Lower weight for matches in answer
            const answerMatches = (faqAnswer.match(new RegExp(keyword, 'g')) || []).length;
            score += answerMatches * 1;
            
            // Bonus for travel keywords
            if (travelKeywords.includes(keyword)) {
                score += 2;
            }
        });
        
        return { ...faq, score };
    }).filter(faq => faq.score > 0);
    
    if (scoredFAQs.length > 0) {
        const bestMatch = scoredFAQs.reduce((prev, current) => 
            (prev.score > current.score) ? prev : current
        );
        
        // Only return if score is above threshold
        if (bestMatch.score >= 2) {
            return bestMatch;
        }
    }
    
    return null;
}

// Send message
function sendMessage(event) {
    event.preventDefault();
    
    const userInput = document.getElementById('userInput');
    if (!userInput) return;
    
    const question = userInput.value.trim();
    if (!question) return;
    
    // Add user message
    addMessage(question, 'user');
    userInput.value = '';
    
    // Hide suggestions
    const suggestedQuestions = document.getElementById('suggestedQuestions');
    if (suggestedQuestions) {
        suggestedQuestions.classList.remove('show');
    }
    
    // Show typing indicator
    showTypingIndicator();
    
    // Process response
    setTimeout(() => {
        if (!isTravelRelated(question)) {
            addMessage(chatbotConfig.nonTravelResponse, 'assistant', true);
            return;
        }
        
        const bestAnswer = findBestTravelAnswer(question);
        
        if (bestAnswer) {
            addMessage(bestAnswer.answer, 'assistant', true);
            logChatbotEvent('answer', question, bestAnswer.id, true);
        } else {
            const fallback = chatbotConfig.fallbackResponses[
                Math.floor(Math.random() * chatbotConfig.fallbackResponses.length)
            ];
            addMessage(fallback, 'assistant', true);
            
            // Suggest contacting for more help
            setTimeout(() => {
                addMessage(chatbotConfig.noResultsResponse, 'assistant', false);
            }, 1000);
            
            logChatbotEvent('answer', question, null, false);
        }
        
        // Update suggestions after response
        setTimeout(updateSuggestions, chatbotConfig.responseDelay);
    }, chatbotConfig.typingDelay);
}

// Submit feedback
function submitFeedback(button, isHelpful) {
    const feedbackDiv = button.parentElement;
    const buttons = feedbackDiv.querySelectorAll('.feedback-btn');
    
    buttons.forEach(btn => {
        btn.disabled = true;
        btn.classList.add('disabled');
    });
    
    button.classList.add(isHelpful ? 'selected-helpful' : 'selected-not-helpful');
    
    feedbackDiv.querySelector('.feedback-text').textContent = 
        isHelpful ? 'Thanks for your feedback!' : 'Thanks! We\'ll improve this.';
    
    logChatbotEvent('feedback', null, null, isHelpful);
}

// Scroll to chat function
function scrollToChat() {
    const chatContainer = document.querySelector('.travel-assistant-container');
    if (chatContainer) {
        chatContainer.scrollIntoView({ 
            behavior: 'smooth',
            block: 'center'
        });
        const userInput = document.getElementById('userInput');
        if (userInput) {
            setTimeout(() => userInput.focus(), 500);
        }
    }
}

//scroll position for floating button
function checkScrollPosition() {
    const floatingBtn = document.getElementById('floatingHelpBtn');
    const chatSection = document.querySelector('.chatbot-section');
    
    if (!floatingBtn || !chatSection) return;
    
    const rect = chatSection.getBoundingClientRect();
    
    if (rect.top > window.innerHeight || rect.bottom < 0) {
        floatingBtn.classList.add('show');
    } else {
        floatingBtn.classList.remove('show');
    }
}

// Log chatbot events for analytics
function logChatbotEvent(eventType, question = null, faqId = null, success = null) {
    const logData = {
        eventType,
        question,
        faqId,
        success,
        timestamp: new Date().toISOString(),
        userAgent: navigator.userAgent,
        url: window.location.href
    };
    
    console.log('Chatbot event:', logData);
    
    // Send to your analytics endpoint if you have one
    // fetch('/api/chatbot-analytics', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/json' },
    //     body: JSON.stringify(logData)
    // }).catch(err => console.log('Analytics error:', err));
}

// Global functions for external access
window.travelChatbot = {
    sendMessage,
    selectSuggestion,
    submitFeedback,
    scrollToChat,
    addMessage,
    logChatbotEvent
};