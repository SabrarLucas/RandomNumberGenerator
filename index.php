<?php
    include_once("./random_number_generator.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <title>Générateur de nombres aléatoires</title>
</head>

<body class="bg-[#1a1823] text-[#e0ddef]">
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="p-4 rounded-lg text-center flex flex-col justify-center items-center max-w-5xl max-h-[400px] min-h-lg ">
            <h1 class="text-5xl font-bold text-[#a995c9]">Générateur de nombres aléatoires</h1>
            <h2 class="text-xl text-[#f2b8c6]">Lance un dé en fonction du nombre de faces</h2>
            <!-- show number here -->
            <p class="text-rose-500">Dé choisi: <?php echo $selected ?? 'None'; ?></p>

            <div class="flex items-center justify-center gap-7">
                <div class="mb-3 w-[150px] h-[150px]"><?php echo $svg ?? ''; ?></div>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
                <!-- <div class="w-[64px] h-[64px] text-[2.7em] border"><?php echo $result ?? ''; ?></div> -->
                <?php foreach ($results as $roll) : ?>
                    <div class="w-[64px] h-[64px] text-[2.7em] border">
                        <?php echo $roll ?? ''; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <form method="post" class="flex items-end justify-center gap-3 w-full">
                <div class="w-full max-w-sm min-w-[200px]">
                    <label for="dice">Choisi un dé:</label>
                    <select name="dice" id="dice" class="w-full h-8 text-sm max-w-[200px] bg-[#1a1823] placeholder:text-[#e0ddef] text-[#e0ddef] border border-[#e0ddef] rounded pl-3 pr-8 transition duration-300 ease focus:outline-none focus:border-[#e0ddef] hover:border-[#e0ddef] shadow-sm focus:shadow-md appearance-none cursor-pointer">
                        <?php
                        $diceOptions = ['d4', 'd6', 'd8', 'd10', 'd12', 'd20'];
                        foreach ($diceOptions as $dice) {
                            $isSelected = $selected === $dice ? 'selected' : '';
                            echo "<option value=\"$dice\" $isSelected>$dice</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="w-full max-w-sm min-w-[200px]">
                    <label class="block text-sm text-[#e0ddef]">
                        Nombre de dé
                    </label>
                    <input type="number" name="dice_instance" class="w-full h-8 bg-transparent placeholder:text-[#e0ddef] text-[#e0ddef] text-sm border border-[#e0ddef] rounded-sm px-3 py-2 transition duration-300 ease focus:outline-none shadow-sm focus:shadow" />
                </div>
                <button type="submit" name="generate" class="inline-flex items-center text-sm gap-3 rounded-md bg-[#a995c9] h-8 py-1 px-3 border border-transparent text-center text-[#e0ddef] transition-all shadow-md hover:shadow-lg focus:bg-[#a09aad] focus:shadow-none active:bg-[#a09aad] hover:bg-[#a09aad] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dices-icon lucide-dices">
                        <rect width="12" height="12" x="2" y="10" rx="2" ry="2" />
                        <path d="m17.92 14 3.5-3.5a2.24 2.24 0 0 0 0-3l-5-4.92a2.24 2.24 0 0 0-3 0L10 6" />
                        <path d="M6 18h.01" />
                        <path d="M10 14h.01" />
                        <path d="M15 6h.01" />
                        <path d="M18 9h.01" />
                    </svg>
                    <span>
                        Générer
                    </span>
                </button>
            </form>
        </div>
    </div>
</body>
</html>