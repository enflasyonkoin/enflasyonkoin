document.addEventListener('DOMContentLoaded', function() {
    var countdownElement = document.getElementById('countdown');
    var currentDate = new Date();
    var targetDate = new Date();
    targetDate.setDate(currentDate.getDate() - 30); // 30 gün önceki tarih

    function updateCountdown() {
        var now = new Date();
        var remainingTime = targetDate - now;

        if (remainingTime <= 0) {
            countdownElement.innerHTML = 'Süre doldu!';
        } else {
            var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
            countdownElement.innerHTML = days + ' gün kaldı';
            setTimeout(updateCountdown, 1000);
        }
    }

    updateCountdown();
});



const haberListesi = document.querySelector('.haber-listesi');
const solButon = document.querySelector('.sol-buton');
const sagButon = document.querySelector('.sag-buton');

solButon.addEventListener('click', () => {
    haberListesi.scrollLeft -= 320; // Haber boyutu + margin
});

sagButon.addEventListener('click', () => {
    haberListesi.scrollLeft += 320; // Haber boyutu + margin
});

  const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const passwordError = document.getElementById('password-error');

    confirmPasswordInput.addEventListener('input', () => {
        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordError.textContent = "Şifreler uyuşmuyor.";
        } else {
            passwordError.textContent = "";
        }
    });
    
    const images = document.querySelectorAll(".gallery img");

let index = 0;

function changeImage() {
    images.forEach(image => {
        image.classList.remove("active");
    });
    images[index].classList.add("active");
    index = (index + 1) % images.length;
}

setInterval(changeImage, 2000);


// Dil değiştirme işlevi
function changeLanguage(language) {
    // Dil değiştirildiğinde çerezi ayarla
    document.cookie = `language=${language}; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`;

    // Sayfayı yenile
    location.reload();
}

// Sayfa yüklendiğinde mevcut dil çerezi kontrol edin
function checkLanguageCookie() {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith('language=')) {
            const language = cookie.substring('language='.length);
            return language;
        }
    }
    return null; // Dil çerezi bulunamazsa null döndürün
}

// Sayfa yüklendiğinde dil değiştirme işlemini kontrol edin
window.addEventListener('load', function () {
    const currentLanguage = checkLanguageCookie();
    if (currentLanguage) {
        // Eğer bir dil çerezi varsa, çevirileri uygula
        applyTranslations(currentLanguage);
    }
});

// Dil değiştirme düğmelerine tıklama işlevi
document.getElementById('english-button').addEventListener('click', function () {
    changeLanguage('english');
});

document.getElementById('turkish-button').addEventListener('click', function () {
    changeLanguage('turkish');
});

