<?php require_once('includes/conexao.php');

$sql_about = "SELECT * FROM about";
$query_about = $mysqli->query($sql_about) or die($mysqli->error);

if ($query_about->num_rows > 0) {
    $about = $query_about->fetch_assoc();
    $name = $about['name'];
    $short_description = $about['short_description'];
    $long_description = $about['long_description'];
}

//Consulta Experience
$sql_experience = "SELECT * FROM experience ORDER BY id DESC";
$query_experience = $mysqli->query($sql_experience) or die($mysqli->error);
// fim Consulta Experience

//Consulta Projects

$sql_project = "SELECT * FROM projects ORDER BY id DESC LIMIT 2";
$query_project = $mysqli->query($sql_project) or die($mysqli->error);

//FIm Consulta Projects

//Consulta Projects

$sql_blog = "SELECT * FROM blog ORDER BY id DESC";
$query_blog = $mysqli->query($sql_blog) or die($mysqli->error);

//FIm Consulta Projects

// Consulta contact
$sql_contact = "SELECT * FROM contact";
$query_contact = $mysqli->query($sql_contact) or die($mysqli->error);

if ($query_contact->num_rows > 0) {
    $contact = $query_contact->fetch_assoc();
}
// fim Consulta contact

// Consulta blog/post
$sql_blog = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 3";
$query_blog = $mysqli->query($sql_blog) or die($mysqli->error);
// fim Consulta blog/post

?>
<?php
$technologies = [
    ['icon' => 'devicon-php-plain', 'name' => 'PHP'],
    ['icon' => 'devicon-laravel-original', 'name' => 'Laravel'],
    ['icon' => 'devicon-mysql-original', 'name' => 'MySQL'],
    ['icon' => 'devicon-postgresql-plain', 'name' => 'PostgreSQL'],
    ['icon' => 'devicon-linux-plain', 'name' => 'Linux'],
    ['icon' => 'devicon-git-plain', 'name' => 'Git'],
    ['icon' => 'devicon-github-original', 'name' => 'GitHub'],
    ['icon' => 'devicon-python-plain', 'name' => 'Python'],
    ['icon' => 'devicon-html5-plain', 'name' => 'HTML5'],
];

// Duplica o array para o scroll ser contínuo
$tech_loop = array_merge($technologies, $technologies);

// Cria o array reverso também
$tech_loop_reverse = array_reverse($tech_loop);
?>


<?php include 'includes/header.php'; ?>


<div class="w-full md:w-4/5 lg:w-3/5 mx-auto px-14 py-12">
    <section class=mb-16>
        <div class="max-w-3xl ml-0 p-4 pb-4 border border-border-secondary-light dark:border-border-primary-dark rounded-lg bg-bg-secondary-light dark:bg-bg-secondary-dark shadow-lg relative">
            <div class=text-left>
                <h1 class="text-4xl font-bold mb-2 text-text-primary-light dark:text-text-primary-dark"><?php echo "$name"; ?></h1>
                <p class="text-gray-400 mb-3 flex items-center text-xl"><svg class="text-gray-400" width="24" height="24" viewBox="-7 -2 24 24">
                        <path fill="currentcolor" d="M4 9.9A5.002 5.002.0 015 0a5 5 0 011 9.9V19a1 1 0 01-2 0V9.9zM5 8a3 3 0 100-6 3 3 0 000 6z" />
                    </svg> Brasil</p>
                <p class="text-xl mb-4 text-text-primary-light dark:text-text-primary-dark"><?php echo htmlspecialchars($short_description); ?></p>
            </div>
            <div class="mt-0 flex justify-center md:justify-center">
                <img src="<?= htmlspecialchars($about['image']) ?>" alt="Foto de Luiz Felipe" class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-2 border-border-primary-light dark:border-border-primary-dark">
            </div>
            <div class="mt-8 md:mt-0 flex flex-wrap justify-center gap-3 md:absolute md:top-4 md:right-4 md:flex-nowrap md:justify-end md:mt-0"><a href="https://drive.google.com/file/d/1eRPASkbhZ7ZDhXf7a_URY_dgosieZEbq/view?usp=sharing" target="_blank" class="text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark bg-bg-tertiary-light dark:bg-bg-tertiary-dark p-2 rounded-md border border-border-secondary-light dark:border-border-secondary-dark hover:border-border-primary-light dark:hover:border-border-primary-dark transition-all" title="CURRÍCULO!">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6 2a2 2 0 0 0-2 2v16c0 1.103.897 2 2 2h12a2 2 0 0 0 2-2V8l-6-6H6zm7 1.5L18.5 9H13V3.5zM8 13h8v2H8v-2zm0 4h8v2H8v-2z" />
                    </svg>
                </a><a href="<?= htmlspecialchars($contact['github']) ?>" class="text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark bg-bg-tertiary-light dark:bg-bg-tertiary-dark p-2 rounded-md border border-border-secondary-light dark:border-border-secondary-dark hover:border-border-primary-light dark:hover:border-border-primary-dark transition-all" target=_blank rel="noopener noreferrer"><svg width="24" height="24" viewBox="0 0 256 256">
                        <g fill="currentcolor" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal">
                            <g transform="scale(8.53333,8.53333)">
                                <path d="M15 3C8.373 3 3 8.373 3 15c0 5.623 3.872 10.328 9.092 11.63-.056-.162-.092-.35-.092-.583v-2.051c-.487.0-1.303.0-1.508.0-.821.0-1.551-.353-1.905-1.009-.393-.729-.461-1.844-1.435-2.526-.289-.227-.069-.486.264-.451.615.174 1.125.596 1.605 1.222.478.627.703.769 1.596.769.433.0 1.081-.025 1.691-.121.328-.833.895-1.6 1.588-1.962-3.996-.411-5.903-2.399-5.903-5.098.0-1.162.495-2.286 1.336-3.233-.276-.94-.623-2.857.106-3.587 1.798.0 2.885 1.166 3.146 1.481.896-.307 1.88-.481 2.914-.481 1.036.0 2.024.174 2.922.483C18.675 9.17 19.763 8 21.565 8c.732.731.381 2.656.102 3.594.836.945 1.328 2.066 1.328 3.226.0 2.697-1.904 4.684-5.894 5.097C18.199 20.49 19 22.1 19 23.313v2.734c0 .104-.023.179-.035.268C23.641 24.676 27 20.236 27 15c0-6.627-5.373-12-12-12z" />
                            </g>
                        </g>
                    </svg>
                </a><a href="<?= htmlspecialchars($contact['linkedin']) ?>" class="text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark bg-bg-tertiary-light dark:bg-bg-tertiary-dark p-2 rounded-md border border-border-secondary-light dark:border-border-secondary-dark hover:border-border-primary-light dark:hover:border-border-primary-dark transition-all" target=_blank rel="noopener noreferrer"><svg width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentcolor" d="M20.47 2H3.53A1.45 1.45.0 002.06 3.43v17.14A1.45 1.45.0 003.53 22h16.94a1.45 1.45.0 001.47-1.43V3.43A1.45 1.45.0 0020.47 2zM8.09 18.74h-3v-9h3zM6.59 8.48a1.56 1.56.0 110-3.12 1.57 1.57.0 110 3.12zm12.32 10.26h-3v-4.83c0-1.21-.43-2-1.52-2A1.65 1.65.0 0012.85 13a2 2 0 00-.1.73v5h-3v-9h3V11a3 3 0 012.71-1.5c2 0 3.45 1.29 3.45 4.06z" />
                    </svg>
                </a><button onclick='copyToClipboard("luizz_costa")' class="text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark bg-bg-tertiary-light dark:bg-bg-tertiary-dark p-2 rounded-md border border-border-secondary-light dark:border-border-secondary-dark hover:border-border-primary-light dark:hover:border-border-primary-dark transition-all" title="Copy Discord Username"><svg width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentcolor" d="M19.888 7.335a5.134 5.134.0 00-2.893-2.418 9.144 9.144.0 00-2.275-.508 9.963 9.963.0 00-.508 1.038 15.039 15.039.0 00-4.56.0 11.372 11.372.0 00-.519-1.038c-.752.082-1.493.249-2.208.497a5.123 5.123.0 00-2.904 2.44 16.176 16.176.0 00-1.91 9.717 16.562 16.562.0 004.98 2.528 4.339 4.339.0 001.104-1.777c-.54-.202-1.06-.45-1.557-.74-.089-.122.254-.32.364-.354a11.826 11.826.0 0010.037.0c.1.0.453.232.364.354-.441.342-1.424.585-1.59.828a7.4 7.4.0 001.105 1.69 16.628 16.628.0 004.99-2.53 16.232 16.232.0 00-2.02-9.727M8.669 14.7a1.943 1.943.0 01-1.92-1.955 1.943 1.943.0 011.92-1.91 1.942 1.942.0 011.933 1.965 1.943 1.943.0 01-1.933 1.9m6.625.0a1.943 1.943.0 01-1.932-1.944 1.932 1.932.0 113.865.034 1.932 1.932.0 01-1.933 1.899z" />
                    </svg></div>
        </div>
    </section>
    <section class="mb-20">
        <h2 class="text-4xl font-bold mb-2 relative">Com o que eu trabalho</h2>
        <div class="tech-carousel">

            <!-- Scroll normal -->
            <div class="carousel-container">
                <div class="carousel-track">
                    <?php foreach ($tech_loop as $tech): ?>
                        <div class="carousel-item">
                            <?php if (str_starts_with($tech['icon'], 'svg-')): ?>
                                <?php if ($tech['icon'] == 'svg-oracle') {
                                    echo '<svg width="30" height="30" viewBox="0 0 24 24"> ... </svg>';
                                } ?>
                            <?php else: ?>
                                <i class="<?= $tech['icon'] ?> text-2xl"></i>
                            <?php endif; ?>
                            <span class="text-xl"><?= $tech['name'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Scroll reverso -->
            <div class="carousel-container">
                <div class="carousel-track carousel-track-reverse">
                    <?php foreach ($tech_loop_reverse as $tech): ?>
                        <div class="carousel-item">
                            <?php if (str_starts_with($tech['icon'], 'svg-')): ?>
                                <?php if ($tech['icon'] == 'svg-oracle') {
                                    echo '<svg width="30" height="30" viewBox="0 0 24 24"> ... </svg>';
                                } ?>
                            <?php else: ?>
                                <i class="<?= $tech['icon'] ?> text-2xl"></i>
                            <?php endif; ?>
                            <span class="text-xl"><?= $tech['name'] ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

    <section>
        <h2 class="text-4xl font-bold mb-5">Experiência</h2>
        <div class="space-y-4 max-w-3xl mx-auto">
            <?php

            if ($query_experience->num_rows > 0):
                while ($num_experience = $query_experience->fetch_assoc()):
            ?>
                    <div class="relative pl-8 before:content-[''] before:absolute before:left-0 before:top-0 before:w-[2px] before:h-full before:bg-gray-700 before:rounded-full">
                        <div class="absolute -left-1.5 top-0 w-2 h-2 bg-gray-700 rounded-full"></div>

                        <div class="text-gray-400 text-xl mb-1">
                            <a href="<?= htmlspecialchars($num_experience['link_company'] ?? '#') ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group inline-flex items-center gap-2 font-medium hover:text-accent-light dark:hover:text-accent-dark transition-colors duration-200">
                                <?= htmlspecialchars($num_experience['company']) ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                                    <path d="M7 17l9.2-9.2M17 17V7H7" />
                                </svg>
                            </a>
                        </div>

                        <p class="text-2xl font-semibold"><?= htmlspecialchars($num_experience['position']) ?></p>
                        <p class="text-gray-400 font-semibold"><?= htmlspecialchars($num_experience['period']) ?></p>
                        <p class="text-gray-400 text-sm"><?= htmlspecialchars($num_experience['locality'] ?? 'Brasil') ?></p>
                        <p class="mt-2"><?= nl2br(htmlspecialchars($num_experience['description'])) ?></p>
                    </div>
                <?php
                endwhile;
            else:
                ?>
                <p class="text-gray-400 text-center">Nenhuma experiência cadastrada ainda.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="mt-12 md:mt-20 mb-12 md:mb-20">
        <div class="flex justify-between items-center mb-6 md:mb-8">
            <h2 class="text-2xl md:text-4xl font-bold">Projetos</h2>
            <!-- Usar php para crud upload de fotos, descricao, tecnologias usadas etc -->
        </div>
        <div class="grid grid-cols-1 gap-6 md:gap-8 max-w-3xl mx-auto">
            <?php


            if ($query_project && $query_project->num_rows > 0):
                while ($project = $query_project->fetch_assoc()):
                    $techs = explode(',', $project['technologies']);
            ?>
                    <div class="project-card relative overflow-hidden rounded-lg bg-[#121212] border border-gray-700 transition-all duration-300 group">
                        <div class="aspect-w-16 aspect-h-9 overflow-hidden relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 z-10"></div>
                            <img src="<?= htmlspecialchars($project['image']) ?>"
                                alt="<?= htmlspecialchars($project['title']) ?>"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-60 z-20"></div>
                            <div class="absolute inset-0 z-30 p-4 pb-3 md:p-6 md:pb-4 flex flex-col justify-end transform transition-transform duration-500 translate-y-0 group-hover:translate-y-[-20px]">

                                <h3 class="text-xl md:text-2xl font-bold mb-1.5 md:mb-2 text-white line-clamp-2">
                                    <?= htmlspecialchars($project['title']) ?>
                                </h3>

                                <div class="hidden sm:flex flex-wrap gap-1 md:gap-2 mb-1.5 md:mb-3">
                                    <?php foreach ($techs as $tech): ?>
                                        <span class="px-1.5 md:px-2 py-0.5 bg-black/30 backdrop-blur-sm rounded-md text-[10px] md:text-xs font-medium text-white">
                                            <?= htmlspecialchars(trim($tech)) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>

                                <p class="hidden md:block text-sm text-white mb-3 line-clamp-3 md:line-clamp-4">
                                    <?= htmlspecialchars($project['description']) ?>
                                </p>

                                <a href="<?= htmlspecialchars($project['link_project']) ?>"
                                    target="_blank"
                                    class="bg-white/90 backdrop-blur-sm hover:bg-white text-black text-xs md:text-sm font-medium py-1 md:py-1.5 px-2 md:px-3 rounded-md inline-block transition-all duration-300 transform opacity-100 md:opacity-0 group-hover:opacity-100 w-fit flex items-center shadow-lg hover:shadow-xl">
                                    Ler mais
                                    <svg class="h-3.5 w-3.5 ml-1 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentcolor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            else:
                ?>
                <p class="text-gray-400 text-center">Nenhum projeto cadastrado ainda.</p>
            <?php endif; ?>
        </div>
        <div class="flex justify-center mt-8">
            <a href="<?= $basePath ?>projects.php" class="text-blue-500 hover:text-blue-400 transition-colors duration-200 text-lg">Ver mais</a>
        </div>
    </section>
    <section class="mt-20 mb-20">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-4xl font-bold">Blogs</h2>
        </div>

        <div class="space-y-8 max-w-3xl mx-auto">
            <?php
            if ($query_blog && $query_blog->num_rows > 0):
                while ($post = $query_blog->fetch_assoc()):
            ?>
                    <div class="group">
                        <p class="text-gray-400 text-sm mb-1"><?= date('Y-m-d', strtotime($post['created_at'])) ?></p>
                        <a href="<?= $basePath ?>blog/<?php echo $post['link_post']; ?>" class="block group">
                            <h3 class="inline-flex items-center text-xl font-medium text-accent-light dark:text-accent-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-200 mb-3">
                                <?= htmlspecialchars($post['title']) ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                                    <path d="M7 17l9.2-9.2M17 17V7H7" />
                                </svg>
                            </h3>
                        </a>
                        <p class="text-gray-400">
                            <?= htmlspecialchars($post['short_description']) ?>
                        </p>
                    </div>
                <?php
                endwhile;
            else:
                ?>
                <p class="text-gray-400 text-center">Nenhum post disponível ainda.</p>
            <?php endif; ?>
        </div>

        <div class="flex justify-center mt-8">
            <a href="<?= $basePath ?>blog.php" class="text-blue-500 hover:text-blue-400 transition-colors duration-200 text-lg">Ver mais</a>
        </div>
    </section>

</div>


<?php include 'includes/footer.php'; ?>