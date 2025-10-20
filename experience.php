<?php
require_once('includes/conexao.php');

// Consulta Experience
$sql_experience = "SELECT * FROM experience ORDER BY id DESC";
$query_experience = $mysqli->query($sql_experience) or die($mysqli->error);
?>


<?php include 'includes/header.php'; ?>


<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-5xl font-bold mb-6 text-text-primary-light dark:text-text-primary-dark">Experiência</h1>

    <div class="space-y-8">
        <?php if ($query_experience->num_rows > 0): ?>
            <?php while ($experience = $query_experience->fetch_assoc()): ?>
                <div class="group relative pl-0 before:content-[''] before:absolute before:left-0 before:top-0 before:w-[2px] before:h-full before:bg-border-secondary-light dark:before:bg-border-secondary-dark before:rounded-full">
                    <div class="absolute -left-1.5 top-0 w-2 h-2 bg-border-secondary-light dark:bg-border-secondary-dark rounded-full"></div>
                    <div class="p-6 rounded-lg bg-bg-primary-light dark:bg-bg-secondary-dark transition-all duration-300 border border-border-primary-light dark:border-border-primary-dark">
                        <div class="flex-grow">
                            <div class="text-text-secondary-light dark:text-text-secondary-dark text-lg mb-1">
                                <a href="<?= htmlspecialchars($experience['link_company'] ?? '#') ?>" target="_blank" rel="noopener noreferrer"
                                    class="group inline-flex items-center gap-2 text-xl font-medium text-text-secondary-light dark:text-text-secondary-dark hover:text-accent-light dark:hover:text-accent-dark transition-colors duration-200">
                                    <?= htmlspecialchars($experience['company']) ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                                        <path d="M7 17l9.2-9.2M17 17V7H7" />
                                    </svg>
                                </a>
                            </div>

                            <div class="flex flex-col md:flex-row md:items-center gap-1 mb-1">
                                <h3 class="text-3xl font-semibold text-text-primary-light dark:text-text-primary-dark">
                                    <?= htmlspecialchars($experience['position']) ?>
                                </h3>
                            </div>

                            <div class="period text-text-secondary-light dark:text-text-secondary-dark text-lg prose">
                                <?= htmlspecialchars($experience['period']) ?>
                            </div>

                            <div class="country text-text-secondary-light dark:text-text-secondary-dark text-lg prose">
                                <?= htmlspecialchars($experience['locality'] ?? 'Brasil') ?>
                            </div>

                            <div class="mt-4">
                                <h4 class="text-lg font-medium text-text-primary-light dark:text-text-primary-dark mb-3">
                                    Principais responsabilidades:
                                </h4>
                                <ul class="list-none space-y-2">
                                    <li class="text-text-secondary-light dark:text-text-secondary-dark text-lg prose">
                                        <?= nl2br(htmlspecialchars($experience['long_description'])) ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-gray-400 text-center">Nenhuma experiência cadastrada ainda.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>