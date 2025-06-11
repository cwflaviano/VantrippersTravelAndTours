
        (function() {
            'use strict';                       
            document.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                showWarning();
                return false;
            });
            document.addEventListener('keydown', function(e) {
                
                if (e.key === 'F12') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                if (e.ctrlKey && e.shiftKey && e.key === 'I') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                if (e.ctrlKey && e.shiftKey && e.key === 'J') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                if (e.ctrlKey && e.shiftKey && e.key === 'C') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                if (e.ctrlKey && e.key === 'u') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                
                if (e.ctrlKey && e.key === 's') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                
                if (e.ctrlKey && e.key === 'a') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                
                if (e.ctrlKey && e.key === 'p') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
                
                
                if (e.ctrlKey && e.key === 'c') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
            });

            
            document.addEventListener('dragstart', function(e) {
                if (e.target.tagName === 'IMG') {
                    e.preventDefault();
                    showWarning();
                    return false;
                }
            });

            
            document.addEventListener('selectstart', function(e) {
                if (e.target.tagName === 'IMG') {
                    e.preventDefault();
                    return false;
                }
            });

        
            document.addEventListener('mousedown', function(e) {
                if (e.target.tagName === 'IMG') {
                    e.preventDefault();
                    return false;
                }
            });

            
            document.addEventListener('touchstart', function(e) {
                if (e.target.tagName === 'IMG') {
                    e.preventDefault();
                }
            });

        
            document.addEventListener('keyup', function(e) {
                if (e.key === 'PrintScreen') {
                    showWarning();
                }
            });

            
            document.addEventListener('copy', function(e) {
                e.clipboardData.setData('text/plain', '');
                e.preventDefault();
                showWarning();
            });

            
            let devtools = {
                open: false,
                orientation: null
            };

            const threshold = 160;

            setInterval(function() {
                if (window.outerHeight - window.innerHeight > threshold || 
                    window.outerWidth - window.innerWidth > threshold) {
                    if (!devtools.open) {
                        devtools.open = true;
                        showWarning();
                    }
                } else {
                    devtools.open = false;
                }
            }, 500);

            
            let pressTimer;
            document.addEventListener('touchstart', function(e) {
                if (e.target.tagName === 'IMG') {
                    pressTimer = setTimeout(function() {
                        showWarning();
                    }, 500);
                }
            });

            document.addEventListener('touchend', function() {
                clearTimeout(pressTimer);
            });

            document.addEventListener('touchmove', function() {
                clearTimeout(pressTimer);
            });

            
            console.log('%c⚠️ WARNING: Content Protection Active', 
                       'color: red; font-size: 20px; font-weight: bold;');
            console.log('%cThis website\'s content is protected by copyright. ' +
                       'Unauthorized downloading or copying is prohibited.', 
                       'color: orange; font-size: 14px;');

            
            if (typeof console !== 'undefined') {
                console.log = function() {};
                console.warn = function() {};
                console.error = function() {};
                console.info = function() {};
                console.debug = function() {};
            }

            
            function addImageProtection() {
                const images = document.querySelectorAll('img');
                images.forEach(function(img) {
                    if (!img.parentElement.classList.contains('protected-wrapper')) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'protected-wrapper';
                        wrapper.style.cssText = 'position: relative; display: inline-block; width: 100%; height: 100%;';
                        
                        const overlay = document.createElement('div');
                        overlay.className = 'image-overlay';
                        overlay.style.cssText = `
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: transparent;
                            z-index: 10;
                            cursor: default;
                        `;
                        
                        img.parentNode.insertBefore(wrapper, img);
                        wrapper.appendChild(img);
                        wrapper.appendChild(overlay);
                    }
                });
            }

            // Apply protection when DOM is loaded
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', addImageProtection);
            } else {
                addImageProtection();
            }

            // Also apply to dynamically added images
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1) { // Element node
                            if (node.tagName === 'IMG' || node.querySelector('img')) {
                                setTimeout(addImageProtection, 100);
                            }
                        }
                    });
                });
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            // Additional mobile protection
            document.addEventListener('gesturestart', function(e) {
                e.preventDefault();
            });

            document.addEventListener('gesturechange', function(e) {
                e.preventDefault();
            });

            document.addEventListener('gestureend', function(e) {
                e.preventDefault();
            });

        })();

        // Clear console on page load
        window.addEventListener('load', function() {
            setTimeout(function() {
                console.clear();
            }, 1000);
        });