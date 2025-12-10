<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Native</title>

    <style>
        /* 
         * Bagian CSS
         * Mengatur tampilan visual UI kalkulator
         */

        /* Mengatur layout halaman agar kalkulator berada di tengah */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full layar vertikal */
            background: #e4e3dd;
            font-family: Arial, sans-serif;
        }

        /* Box utama kalkulator */
        .calc {
            background: #F3F2EC; /* Warna tema utama */
            padding: 20px;
            border-radius: 15px;
            width: 280px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
        }

        /* Layar untuk menampilkan angka input dan hasil */
        .screen {
            width: 100%;
            height: 70px;
            background: #ffffff;
            border-radius: 8px;
            font-size: 32px;
            text-align: right; /* Angka sejajar kanan */
            padding: 12px;
            margin-bottom: 18px;
            color: #1c1c1c;
            border: 2px solid #d9d8d0;
        }

        /* Grid untuk mengatur tombol jadi 4 kolom */
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        /* Style dasar tombol */
        button {
            height: 55px;
            font-size: 22px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s; /* Animasi hover & click */
        }

        /* Efek tombol disentuh */
        button:hover {
            filter: brightness(110%);
        }

        /* Efek tombol ditekan */
        button:active {
            transform: scale(0.95);
        }

        /* Tombol operator menggunakan warna biru tema */
        .op {
            background: #1E93AB;
            color: white;
            font-weight: bold;
        }

        /* Tombol angka warna putih keabu-abuan */
        .num {
            background: #F3F2EC;
            color: #222;
            border: 1.5px solid #cfcfc7;
        }

        /* Tombol clear warna merah tegas */
        .clear {
            background: #E62727;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="calc">
    <!-- Layar untuk menampilkan angka & hasil -->
    <div id="screen" class="screen">0</div>

    <!-- Kumpulan tombol menggunakan grid -->
    <div class="buttons">
        <!-- Tombol hapus total -->
        <button class="clear" onclick="clearScreen()">C</button>

        <!-- Tombol operator -->
        <button class="op" onclick="inputOp('/')">÷</button>
        <button class="op" onclick="inputOp('*')">×</button>
        <button class="op" onclick="inputOp('-')">−</button>

        <!-- Tombol angka 7 8 9 dan operator + -->
        <button class="num" onclick="inputNum('7')">7</button>
        <button class="num" onclick="inputNum('8')">8</button>
        <button class="num" onclick="inputNum('9')">9</button>
        <button class="op" onclick="inputOp('+')">+</button>

        <!-- Tombol angka 4 5 6 dan tombol hitung -->
        <button class="num" onclick="inputNum('4')">4</button>
        <button class="num" onclick="inputNum('5')">5</button>
        <button class="num" onclick="inputNum('6')">6</button>
        <button class="op" onclick="calculate()">=</button>

        <!-- Tombol angka 1 2 3 -->
        <button class="num" onclick="inputNum('1')">1</button>
        <button class="num" onclick="inputNum('2')">2</button>
        <button class="num" onclick="inputNum('3')">3</button>

        <!-- Tombol angka 0 span 2 kolom -->
        <button class="num" onclick="inputNum('0')" style="grid-column: span 2;">0</button>

        <!-- Tombol titik desimal -->
        <button class="num" onclick="inputNum('.')">.</button>
    </div>
</div>

<script>
    /* 
     * Bagian JavaScript
     * Mengatur logika kalkulasi pada kalkulator
     */

    // Ambil elemen layar
    let screen = document.getElementById('screen');

    // Menyimpan angka + operator sebelum dihitung
    let expression = "";

    // Fungsi klik tombol angka
    function inputNum(num) {
        // Jika awalnya 0, hapus dulu
        if (screen.innerText === "0") screen.innerText = "";

        // Tambahkan angka ke layar
        screen.innerText += num;
    }

    // Fungsi klik operator (+, -, *, /)
    function inputOp(op) {
        // Simpan angka sebelumnya + operator
        expression = screen.innerText + " " + op + " ";

        // Kosongkan layar untuk input angka baru
        screen.innerText = "";
    }

    // Fungsi hitung saat klik tombol '='
    function calculate() {
        // Tambahkan angka terakhir ke expression
        expression += screen.innerText;

        try {
            // eval() menghitung ekspresi matematika
            screen.innerText = eval(expression);
        } catch {
            // Jika error, tampilkan pesan Error
            screen.innerText = "Error";
        }

        // Reset expression setelah selesai
        expression = "";
    }

    // Fungsi reset layar (C)
    function clearScreen() {
        screen.innerText = "0";
        expression = "";
    }
</script>

</body>
</html>
