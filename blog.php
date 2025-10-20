<?php require_once 'includes/conexao.php';

$sql_blog = "SELECT * FROM blog ORDER BY created_at DESC";
$query_blog = $mysqli->query($sql_blog) or die($mysqli->error);


?>



<?php require_once 'includes/header.php'; ?>


<div class="w-full md:w-3/4 lg:w-1/2 mx-auto px-4 py-12">
    <h1 class="text-5xl font-bold mb-12 text-text-primary-light dark:text-text-primary-dark">Blogs</h1>
    <div class="space-y-12 max-w-3xl mx-auto">

        <?php
        if ($query_blog->num_rows > 0) {
            while ($post = $query_blog->fetch_assoc()) {
                $tags = explode(',', $post['technologies']); // transforma string em array
        ?>
                <div class="group">
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm mb-2">
                        <?php echo date('Y-m-d', strtotime($post['created_at'])); ?>
                    </p>

                    <a href="<?= $basePath ?>blog/<?php echo $post['link_post']; ?>" class="block">
                        <h3 class="inline-flex items-center text-xl font-medium text-accent-light dark:text-accent-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-200 mb-3">
                            <?php echo $post['title']; ?>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 opacity-70 group-hover:opacity-100 transition-opacity duration-200">
                                <path d="M7 17l9.2-9.2M17 17V7H7" />
                            </svg>
                        </h3>
                    </a>

                    <p class="text-text-secondary-light dark:text-text-secondary-dark mb-4 prose">
                        <?php echo $post['short_description']; ?>
                    </p>

                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($tags as $tag) : ?>
                            <span class="px-2 py-1 text-xs bg-bg-primary-light dark:bg-bg-tertiary-dark text-text-secondary-light dark:text-text-secondary-dark border border-border-primary-light dark:border-border-primary-dark rounded-md transition-all duration-300">
                                <?php echo trim($tag); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Nenhum post encontrado.</p>";
        }

        $mysqli->close();
        ?>

    </div>
</div>

<?php include 'includes/footer.php'; ?>