<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Clouds - Dashboard Cuaca</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
  <aside>
    <div class="logo">E-Clouds</div>
    <nav class="sidebar">
      <ul>
        <li id="nav-dashboard">Dashboard</li>
        <li id="nav-map">Map</li>
        <li>Saved Location</li>
        <li><a href="calender.html" style="text-decoration: none; color: inherit;">Calendar</a></li>
        <li id="nav-settings">Settings Bahasa</li>
        <li id="toggleModeBtn">🌓 Mode</li>
        <li>Log Out</li>
      </ul>
    </nav>
  </aside>

  <main class="main">
    <div class="topbar">
      <div class="search">
        <input type="text" id="cityInput" placeholder="Search city..." />
      </div>
      <div class="profile">
        <img src="https://i.pravatar.cc/40" alt="Profile" style="border-radius: 50%" />
      </div>
    </div>

    <!-- DASHBOARD SECTION -->
    <div class="dashboard">
      <div>
        <div class="weather-box">
          <h2 id="cityName">Klaten</h2>
          <h1 id="temp">26°C</h1>
          <p id="conditionText">Mostly Clear</p>

          <div class="details-grid">
            <div class="detail-box"><strong>Pressure</strong><br><span id="pressure">720 hPa</span></div>
            <div class="detail-box"><strong>Humidity</strong><br><span id="humidity">32%</span></div>
            <div class="detail-box"><strong>Wind</strong><br><span id="wind">12 km/h</span></div>
          </div>
        </div>

        <div class="details-grid" style="margin-top: 2rem;">
          <div class="detail-box"><strong>Feels Like</strong><br><span id="feelslike">26°C</span></div>
          <div class="detail-box"><strong>UV Index</strong><br><span id="uv">Low</span></div>
          <div class="detail-box"><strong>Wind Dir</strong><br><span id="wind_dir">N/A</span></div>
          <div class="detail-box"><strong>Last Update</strong><br><span id="last_updated">--</span></div>
        </div>
      </div>

      <div class="weekly-forecast">
        <h3>This Week</h3>
        <div class="day"><span>Now</span><span id="nowTemp">--</span></div>
        <div class="day"><span>Tomorrow</span><span>Coming soon</span></div>
        <div class="day"><span>Friday</span><span>Coming soon</span></div>
        <div class="day"><span>Saturday</span><span>Coming soon</span></div>
        <div class="day"><span>Sunday</span><span>Coming soon</span></div>
        <div class="day"><span>Monday</span><span>Coming soon</span></div>
        <div class="day"><span>Tuesday</span><span>Coming soon</span></div>
        <div class="day"><span>Wednesday</span><span>Coming soon</span></div>
      </div>
    </div>

    <!-- MAP SECTION -->
    <div class="map-page">
      <h2 style="margin-bottom: 1rem;">Pilih Lokasi dari Peta</h2>
      <div id="map"></div>
    </div>

    <!-- SETTINGS BAHASA SECTION -->
    <div class="settings-page">
      <div class="settings-container">
        <h2>Pengaturan Bahasa</h2>
        <div class="setting-item">
          <label for="languageSelect">Bahasa</label>
          <select id="languageSelect">
            <option value="id">Indonesia</option>
            <option value="en">English</option>
          </select>
        </div>
        <div class="save-message" id="saveMessage">Bahasa telah disimpan!</div>
      </div>
    </div>
  </main>

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <!-- Custom JS -->
  <script src="{{ asset ('js/scripts.js') }}"></script>
</body>
</html>