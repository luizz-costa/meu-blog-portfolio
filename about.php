<?php
require_once('includes/conexao.php');

// Consulta Sobre Mim (fixo)
$sql_about = "SELECT * FROM about LIMIT 1";
$query_about = $mysqli->query($sql_about) or die($mysqli->error);
$about = $query_about->fetch_assoc();

// // Consulta Certificações (dinâmico)
// $sql_certifications = "SELECT * FROM certifications ORDER BY id DESC";
// $query_certifications = $mysqli->query($sql_certifications) or die($mysqli->error);
// 
?>



<?php include 'includes/header.php'; ?>

<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-5xl font-bold mb-6 text-text-primary-light dark:text-text-primary-dark">Sobre Mim</h1>

    <div class="flex flex-col gap-8">
        <div class="flex-grow">

            <!-- Texto fixo -->
            <div class="bg-bg-primary-light dark:bg-bg-secondary-dark p-8 rounded-lg mb-8 border border-border-primary-light dark:border-border-primary-dark">
                <div class="prose prose-invert prose-xl max-w-none">
                    <p><?= nl2br(htmlspecialchars($about['long_description'])) ?></p>
                </div>
            </div>

            <!-- Certificações -->
            <div class="bg-bg-primary-light dark:bg-bg-secondary-dark p-6 md:p-8 rounded-lg mb-8 border border-border-primary-light dark:border-border-primary-dark">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6 text-text-primary-light dark:text-text-primary-dark">Certificações</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php if ($query_certifications && $query_certifications->num_rows > 0): ?>
                        <?php while ($cert = $query_certifications->fetch_assoc()): ?>
                            <a href="<?= htmlspecialchars($cert['link'] ?? '#') ?>"
                                target="_blank"
                                class="flex flex-col h-full p-4 md:p-6 rounded-lg bg-bg-primary-light dark:bg-bg-secondary-dark border border-border-primary-light dark:border-border-primary-dark hover:shadow-md transition-all duration-300">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="inline-flex items-center text-lg md:text-xl font-semibold text-text-primary-light dark:text-text-primary-dark">
                                        <?= htmlspecialchars($cert['title']) ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                                            <path d="M7 17l9.2-9.2M17 17V7H7" />
                                        </svg>
                                    </h3>
                                </div>
                                <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm prose mb-1">
                                    <?= htmlspecialchars($cert['date']) ?>
                                </p>
                            </a>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-gray-400 text-center col-span-2">Nenhuma certificação cadastrada ainda.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>