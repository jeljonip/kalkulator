<?php
$display = "";

if (isset($_POST['btn'])) {
    $btn = $_POST['btn'];

    if ($btn == "AC") {
        $display = "";
    } else if ($btn == "=") {
        $expr = $_POST['display'];
        $expr = str_replace("×", "*", $expr);
        $expr = str_replace("÷", "/", $expr);

        try {
            $display = eval("return $expr;");
        } catch (Throwable $e) {
            $display = "Error";
        }
    } else {
        $display = $_POST['display'] . $btn;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Mobile</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #ebfff0;
        }
        .btn-normal {
            background-color: #d3edda;
            color: #2e5336;
        }
        .btn-operator {
            background-color: #5abf75;
            color: white;
        }
    </style>
</head>

<body class="flex justify-center items-center h-screen">

    <form method="POST">
        <div class="p-6 rounded-3xl w-80 shadow-xl" style="background-color:#ebfff0">

            <!-- Display -->
            <input 
                type="text" 
                name="display" 
                value="<?= $display ?>" 
                class="w-full text-right text-4xl bg-transparent border-0 focus:ring-0 mb-6 text-[#2e5336]"
                readonly
            >

            <!-- Grid -->
            <div class="grid grid-cols-4 gap-3">

                <!-- Row 1 -->
                <button name="btn" value="AC" class="p-4 rounded-xl btn-operator font-bold">AC</button>
                <button name="btn" value="." class="p-4 rounded-xl btn-normal text-xl">.</button>
                <button name="btn" value="%" class="p-4 rounded-xl btn-normal text-xl">%</button>
                <button name="btn" value="+" class="p-4 rounded-xl btn-operator text-xl font-bold">+</button>

                <!-- Row 2 -->
                <button name="btn" value="1" class="p-4 rounded-xl btn-normal text-xl">1</button>
                <button name="btn" value="2" class="p-4 rounded-xl btn-normal text-xl">2</button>
                <button name="btn" value="3" class="p-4 rounded-xl btn-normal text-xl">3</button>
                <button name="btn" value="×" class="p-4 rounded-xl btn-operator text-xl font-bold">×</button>

                <!-- Row 3 -->
                <button name="btn" value="4" class="p-4 rounded-xl btn-normal text-xl">4</button>
                <button name="btn" value="5" class="p-4 rounded-xl btn-normal text-xl">5</button>
                <button name="btn" value="6" class="p-4 rounded-xl btn-normal text-xl">6</button>
                <button name="btn" value="-" class="p-4 rounded-xl btn-operator text-xl font-bold">-</button>

                <!-- Row 4 -->
                <button name="btn" value="7" class="p-4 rounded-xl btn-normal text-xl">7</button>
                <button name="btn" value="8" class="p-4 rounded-xl btn-normal text-xl">8</button>
                <button name="btn" value="9" class="p-4 rounded-xl btn-normal text-xl">9</button>
                <button name="btn" value="÷" class="p-4 rounded-xl btn-operator text-xl font-bold">÷</button>

                <!-- Row 5 -->
                <button name="btn" value="0" class="p-4 rounded-xl btn-normal text-xl col-span-1">0</button>
                <button name="btn" value="00" class="p-4 rounded-xl btn-normal text-xl col-span-1">00</button>
                <button name="btn" value="=" class="p-4 rounded-xl btn-operator text-xl font-bold col-span-2">=</button>

            </div>

        </div>
    </form>

</body>
</html>
