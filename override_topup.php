<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hai Zizi!</title>
  <!-- Google Font lucu -->
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <style>
    /* Animasi background gradient bergerak */
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fad0c4, #ffdde1);
      background-size: 400% 400%;
      animation: gradientMove 10s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Permanent Marker', cursive;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    /* Container utama */
    .container {
      background: rgba(255, 255, 255, 0.95);
      padding: 30px 40px;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      text-align: center;
      position: relative;
      overflow: hidden;
      max-width: 400px;
    }
    h1 {
      font-size: 2.8em;
      color: #ff4081;
      margin: 0 0 10px;
      animation: bounce 1.5s infinite;
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }
    p {
      font-size: 1.2em;
      color: #555;
      margin: 10px 0;
    }
    .button {
      background-color: #ff4081;
      color: #fff;
      border: none;
      padding: 12px 25px;
      font-size: 1.1em;
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.2s;
      margin-top: 20px;
    }
    .button:hover {
      transform: scale(1.05);
    }
    /* Pesan kejutan, tersembunyi awalnya */
    #message {
      margin-top: 20px;
      opacity: 0;
      transform: scale(0.8);
      transition: opacity 0.8s ease, transform 0.8s ease;
      font-weight: bold;
      color: #ff4081;
    }
    #message.show {
      opacity: 1;
      transform: scale(1);
    }
    /* Style form kirim pesan */
    .form-group {
      margin-top: 20px;
      text-align: left;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-size: 1.1em;
      color: #333;
    }
    .form-group textarea {
      width: 100%;
      height: 80px;
      padding: 8px;
      font-family: 'Permanent Marker', cursive;
      font-size: 1em;
      border: 2px solid #ff4081;
      border-radius: 10px;
      resize: none;
    }
    .form-group button {
      margin-top: 10px;
      background-color: #ff4081;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 1em;
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .form-group button:hover {
      transform: scale(1.05);
    }
    /* Animasi confetti */
    .confetti {
      position: absolute;
      width: 8px;
      height: 8px;
      background-color: #ff4081;
      opacity: 0.8;
      animation: fall linear infinite;
      z-index: 1;
    }
    @keyframes fall {
      0% { transform: translateY(-20px) rotate(0deg); opacity: 1; }
      100% { transform: translateY(600px) rotate(360deg); opacity: 0; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Hai Zizi!</h1>
    <p>Kamu selalu membuat hari-hari jadi penuh warna!</p>
    <button class="button" onclick="showMessage()">coba klik!</button>
    <div id="message">
      <p>tidak sekeren jehyun, btw maaf ya klo pernah bikin risih/ngenganggu kamu, ya mungkin skrang lebih beda. hehe ><</p>
    </div>
    
    <!-- Form kirim pesan ke bot Telegram -->
    <div class="form-group">
      <label for="pesan">Kirim pesan untuk aku:</label>
      <textarea id="pesan" placeholder="Tenang zii pasti aku baca kok, kalau gaada ya gausah diisi, sory agak gajelas..."></textarea>
      <button onclick="sendTelegramMessage()">Kirim!</button>
    </div>
  </div>
  
  <script>
    // Tampilkan pesan kejutan
    function showMessage() {
      document.getElementById('message').classList.add('show');
    }
    
    // Ganti dengan bot token dan chat ID Telegram yang sesuai
    const botToken = '7568215692:AAHDnvGbnyMl1T5IzWAkA7WBG93WjUeYKTY';
    const chatId = '7432500460';
    
    // Fungsi untuk mengirim pesan ke Telegram Bot
    function sendTelegramMessage() {
      const pesan = document.getElementById('pesan').value.trim();
      if (!pesan) {
        alert('Pesan tidak boleh kosong!');
        return;
      }
      const url = `https://api.telegram.org/bot${botToken}/sendMessage?chat_id=${chatId}&text=${encodeURIComponent(pesan)}`;
      
      fetch(url)
        .then(response => response.json())
        .then(data => {
          if (data.ok) {
            alert('Pesan berhasil dikirim!');
            document.getElementById('pesan').value = '';
          } else {
            alert('Gagal mengirim pesan. Cek kembali bot token dan chat ID.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat mengirim pesan.');
        });
    }
    
    // Fungsi untuk membuat confetti secara acak
    function createConfetti() {
      for (let i = 0; i < 40; i++) {
        const confetti = document.createElement('div');
        confetti.classList.add('confetti');
        confetti.style.left = Math.random() * window.innerWidth + 'px';
        confetti.style.backgroundColor = "hsl(" + Math.floor(Math.random() * 360) + ", 70%, 70%)";
        confetti.style.animationDuration = (3 + Math.random() * 2) + "s";
        confetti.style.animationDelay = Math.random() * 3 + "s";
        document.body.appendChild(confetti);
      }
    }
    createConfetti();
  </script>
</body>
</html>
