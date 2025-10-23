const apiKey = "c77f095defdb4193a1530532250508";

async function fetchWeather(query) {
  try {
    const response = await fetch(`https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${query}&aqi=no`);
    const data = await response.json();

    document.getElementById("cityName").innerText = data.location.name;
    document.getElementById("temp").innerText = data.current.temp_c + "°C";
    document.getElementById("conditionText").innerText = data.current.condition.text;
    document.getElementById("pressure").innerText = data.current.pressure_mb + " hPa";
    document.getElementById("humidity").innerText = data.current.humidity + "%";
    document.getElementById("wind").innerText = data.current.wind_kph + " km/h";
    document.getElementById("feelslike").innerText = data.current.feelslike_c + "°C";
    document.getElementById("uv").innerText = data.current.uv;
    document.getElementById("wind_dir").innerText = data.current.wind_dir;
    document.getElementById("last_updated").innerText = data.current.last_updated;
    document.getElementById("nowTemp").innerText = data.current.temp_c + "°C " + data.current.condition.text;
  } catch (err) {
    alert("Kota tidak ditemukan atau API error.");
  }
}

document.getElementById("cityInput").addEventListener("keydown", function (e) {
  if (e.key === "Enter") {
    const city = e.target.value.trim();
    if (city) fetchWeather(city);
  }
});
fetchWeather("Klaten");

// MAP
const map = L.map('map').setView([-7.7, 110.6], 7);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

let marker = L.marker([-7.7, 110.6]).addTo(map)
  .bindPopup('Klaten')
  .openPopup();

map.on('click', function (e) {
  const lat = e.latlng.lat;
  const lon = e.latlng.lng;
  fetchWeather(`${lat},${lon}`);
  marker.setLatLng([lat, lon])
    .bindPopup(`Lat: ${lat.toFixed(2)}, Lon: ${lon.toFixed(2)}`)
    .openPopup();
});

// NAVIGATION
const dashboardBtn = document.getElementById("nav-dashboard");
const mapBtn = document.getElementById("nav-map");
const settingsBtn = document.getElementById("nav-settings");

const dashboardPage = document.querySelector(".dashboard");
const mapPage = document.querySelector(".map-page");
const settingsPage = document.querySelector(".settings-page");

dashboardBtn.addEventListener("click", () => {
  dashboardPage.style.display = "grid";
  mapPage.style.display = "none";
  settingsPage.style.display = "none";
});

mapBtn.addEventListener("click", () => {
  dashboardPage.style.display = "none";
  mapPage.style.display = "flex";
  settingsPage.style.display = "none";
  setTimeout(() => map.invalidateSize(), 100);
});

settingsBtn.addEventListener("click", () => {
  dashboardPage.style.display = "none";
  mapPage.style.display = "none";
  settingsPage.style.display = "flex";
});

// DARK MODE
const toggleBtn = document.getElementById("toggleModeBtn");
const body = document.body;

if (localStorage.getItem("mode") === "dark") {
  body.classList.add("dark-mode");
  toggleBtn.textContent = "🌞 Light Mode";
}

toggleBtn.addEventListener("click", () => {
  body.classList.toggle("dark-mode");
  const isDark = body.classList.contains("dark-mode");
  toggleBtn.textContent = isDark ? "🌞 Light Mode" : "🌓 Mode";
  localStorage.setItem("mode", isDark ? "dark" : "light");
});

// BAHASA
const languageSelect = document.getElementById('languageSelect');
const saveMessage = document.getElementById('saveMessage');
const savedLang = localStorage.getItem('selectedLanguage');
if (savedLang) {
  languageSelect.value = savedLang;
}
languageSelect.addEventListener('change', () => {
  localStorage.setItem('selectedLanguage', languageSelect.value);
  saveMessage.style.display = 'block';
  setTimeout(() => {
    saveMessage.style.display = 'none';
  }, 2000);
});
