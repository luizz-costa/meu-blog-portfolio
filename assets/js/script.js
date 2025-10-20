// Google Analytics


// Theme Management
function initializeTheme() {
    const isDarkMode = localStorage.getItem("color-theme") === "dark" ||
        (!("color-theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches);

    if (isDarkMode) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }

    return isDarkMode;
}

// Local Time Update
function updateLocalTime() {
    const timeElements = document.querySelectorAll("#local-time, #mobile-local-time");
    timeElements.forEach(element => {
        if (element) {
            const now = new Date();
            const timeString = now.toLocaleTimeString([], {
                hour: "2-digit",
                minute: "2-digit"
            });
            element.textContent = timeString;
        }
    });
}

// Mobile Menu Management
function initializeMobileMenu() {
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenuClose = document.getElementById("mobile-menu-close");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuLinks = document.querySelectorAll("[data-menu-link]");

    function openMobileMenu() {
        mobileMenu.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    }

    function closeMobileMenu() {
        mobileMenu.classList.add("hidden");
        document.body.style.overflow = "";
    }

    if (mobileMenuButton) {
        mobileMenuButton.addEventListener("click", openMobileMenu);
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener("click", closeMobileMenu);
    }

    menuLinks.forEach(link => {
        link.addEventListener("click", closeMobileMenu);
    });

    // Close menu when clicking outside or pressing Escape
    mobileMenu.addEventListener("click", function (event) {
        if (event.target === mobileMenu) {
            closeMobileMenu();
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape" && !mobileMenu.classList.contains("hidden")) {
            closeMobileMenu();
        }
    });
}

// Theme Toggle Management
function initializeThemeToggle() {
    const themeToggleBtnDesktop = document.getElementById("theme-toggle-button-desktop");
    const themeToggleDarkIconDesktop = document.getElementById("theme-toggle-dark-icon-desktop");
    const themeToggleLightIconDesktop = document.getElementById("theme-toggle-light-icon-desktop");
    const themeToggleBtnMobile = document.getElementById("theme-toggle-button-mobile");
    const themeToggleDarkIconMobile = document.getElementById("theme-toggle-dark-icon-mobile");
    const themeToggleLightIconMobile = document.getElementById("theme-toggle-light-icon-mobile");

    function updateIcons(isDark) {
        // Update desktop icons
        if (themeToggleDarkIconDesktop && themeToggleLightIconDesktop) {
            if (isDark) {
                themeToggleLightIconDesktop.classList.remove("hidden");
                themeToggleDarkIconDesktop.classList.add("hidden");
            } else {
                themeToggleLightIconDesktop.classList.add("hidden");
                themeToggleDarkIconDesktop.classList.remove("hidden");
            }
        }

        // Update mobile icons
        if (themeToggleDarkIconMobile && themeToggleLightIconMobile) {
            if (isDark) {
                themeToggleLightIconMobile.classList.remove("hidden");
                themeToggleDarkIconMobile.classList.add("hidden");
            } else {
                themeToggleLightIconMobile.classList.add("hidden");
                themeToggleDarkIconMobile.classList.remove("hidden");
            }
        }
    }

    function applyTheme(isDark) {
        if (isDark) {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        }
        updateIcons(isDark);
    }

    function themeToggleClickHandler() {
        const isDark = document.documentElement.classList.contains("dark");
        applyTheme(!isDark);

        // Close mobile menu on theme toggle if on mobile
        if (window.innerWidth < 768) {
            const mobileMenu = document.getElementById("mobile-menu");
            if (mobileMenu && !mobileMenu.classList.contains("hidden")) {
                mobileMenu.classList.add("hidden");
                document.body.style.overflow = "";
            }
        }
    }

    // Set initial theme and icons
    const initialIsDarkMode = initializeTheme();
    applyTheme(initialIsDarkMode);

    // Add event listeners
    if (themeToggleBtnDesktop) {
        themeToggleBtnDesktop.addEventListener("click", themeToggleClickHandler);
    }

    if (themeToggleBtnMobile) {
        themeToggleBtnMobile.addEventListener("click", themeToggleClickHandler);
    }
}

// Clipboard Functions
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function () {
        showToaster("Discord username copied to clipboard!");
    }, function (error) {
        showToaster("Failed to copy username.");
        console.error("Could not copy text: ", error);
    });
}

function showToaster(message) {
    const toaster = document.createElement("div");
    toaster.className = "toaster";
    toaster.textContent = message;
    document.body.appendChild(toaster);

    setTimeout(() => {
        toaster.classList.add("show");
    }, 10);

    setTimeout(() => {
        toaster.classList.remove("show");
        setTimeout(() => {
            document.body.removeChild(toaster);
        }, 500);
    }, 3000);
}

// Initialize everything when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    initializeTheme();
    updateLocalTime();
    setInterval(updateLocalTime, 1000);
    initializeMobileMenu();
    initializeThemeToggle();
});