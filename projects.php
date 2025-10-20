<?php
require_once('includes/conexao.php');

// Consulta os projetos
$sql_project = "SELECT * FROM projects ORDER BY id DESC";
$query_project = $mysqli->query($sql_project) or die($mysqli->error);
?>



<?php include 'includes/header.php'; ?>

<div class="w-full md:w-3/4 lg:w-1/2 mx-auto px-4 py-12">
    <h1 class="text-3xl md:text-5xl font-bold mb-8 md:mb-12 text-text-primary-light dark:text-text-primary-dark">
        Projetos
    </h1>

    <div class="grid grid-cols-1 gap-6 md:gap-8 max-w-3xl mx-auto">

        <?php if ($query_project && $query_project->num_rows > 0): ?>
            <?php while ($project = $query_project->fetch_assoc()): ?>
                <?php $techs = explode(',', $project['technologies']); ?>

                <div class="project-card relative overflow-hidden rounded-lg bg-bg-primary-light dark:bg-bg-secondary-dark border border-border-primary-light dark:border-border-primary-dark transition-all duration-300 group">
                    <div class="aspect-w-16 aspect-h-9 overflow-hidden relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-accent-light/20 to-accent-light/20 dark:from-accent-dark/20 dark:to-accent-dark/20 z-10"></div>
                        <img src="<?= htmlspecialchars($project['image']) ?>"
                            alt="<?= htmlspecialchars($project['title']) ?>"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-60 z-20"></div>

                        <div class="absolute inset-0 z-30 p-4 pb-3 md:p-6 md:pb-4 flex flex-col justify-end transform transition-transform duration-500 translate-y-0 group-hover:translate-y-[-20px]">
                            <h3 class="text-xl md:text-2xl font-bold mb-1.5 md:mb-2 text-white line-clamp-2">
                                <?= htmlspecialchars($project['title']) ?>
                            </h3>

                            <div class="flex flex-wrap gap-1 md:gap-2 mb-1.5 md:mb-3">
                                <?php foreach ($techs as $tech): ?>
                                    <span class="px-1.5 md:px-2 py-0.5 bg-neutral-700/30 backdrop-blur-sm rounded-md text-[10px] md:text-xs font-medium text-white">
                                        <?= htmlspecialchars(trim($tech)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <p class="hidden md:block text-sm text-white mb-3 line-clamp-3 md:line-clamp-4">
                                <?= htmlspecialchars($project['description']) ?>
                            </p>

                            <a href="<?= htmlspecialchars($project['link_project']) ?>"
                                target="_blank"
                                class="bg-accent-light/90 dark:bg-accent-dark/90 backdrop-blur-sm hover:bg-accent-light dark:hover:bg-accent-dark text-neutral-800 dark:text-white text-xs md:text-sm font-medium py-1 md:py-1.5 px-2 md:px-3 rounded-md inline-block transition-all duration-300 transform opacity-100 md:opacity-0 group-hover:opacity-100 w-fit flex items-center shadow-lg hover:shadow-xl">
                                Ler mais
                                <svg class="h-3.5 w-3.5 ml-1 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentcolor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-gray-400 text-center">Nenhum projeto cadastrado ainda.</p>
        <?php endif; ?>

    </div>
</div>

<?php include 'includes/footer.php'; ?>