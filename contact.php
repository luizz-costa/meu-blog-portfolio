<?php require_once('includes/conexao.php');

$sql_contact = "SELECT * FROM contact";
$query_contact = $mysqli->query($sql_contact) or die($mysqli->error);

if ($query_contact->num_rows > 0) {
    $contact = $query_contact->fetch_assoc();
}

?>



<?php include 'includes/header.php'; ?>

<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-5xl font-bold mb-6 text-text-primary-light dark:text-text-primary-dark">Contato</h1>
    <div class="bg-bg-primary-light dark:bg-bg-secondary-dark p-8 rounded-lg border border-border-primary-light dark:border-border-primary-dark">
        <div class="prose prose-invert prose-lg max-w-none">
            <div class="text-text-secondary-light dark:text-text-secondary-dark text-lg mb-8">
                <p>Você pode entrar em contato comigo por E-mail, Discord, ou LinkedIn. Geralmente respondo em até um dia.</p>
            </div>
            <div class="border border-border-primary-light dark:border-border-primary-dark rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="mailto:<?= htmlspecialchars($contact['email']) ?>" class="contact-link flex items-center justify-center gap-3 p-4 rounded-lg bg-bg-primary-light dark:bg-bg-secondary-dark transition-all duration-300">
                        <svg class="w-7 h-7 text-text-secondary-light dark:text-text-secondary-dark shrink-0" fill="none" stroke="currentcolor" viewBox="0 0 24 24" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22.0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5A2 2 0 003 7v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Email</span>
                    </a>

                    <button onclick='copyToClipboard("luizz_costa")' title="Discord copiado!" class="contact-link flex items-center justify-center gap-3 p-4 rounded-lg bg-bg-primary-light dark:bg-bg-secondary-dark transition-all duration-300">
                        <svg class="w-7 h-7 text-text-secondary-light dark:text-text-secondary-dark shrink-0" viewBox="0 0 24 24" fill="currentcolor">
                            <path d="M20.317 4.37a19.791 19.791.0 00-4.885-1.515.074.074.0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27.0 00-5.487.0 12.64 12.64.0 00-.617-1.25.077.077.0 00-.079-.037A19.736 19.736.0 003.677 4.37a.07.07.0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082.0 00.031.057 19.9 19.9.0 005.993 3.03.078.078.0 00.084-.028 14.09 14.09.0 001.226-1.994.076.076.0 00-.041-.106 13.107 13.107.0 01-1.872-.892.077.077.0 01-.008-.128 10.2 10.2.0 00.372-.292.074.074.0 01.077-.01c3.928 1.793 8.18 1.793 12.062.0a.074.074.0 01.078.01c.12.098.246.198.373.292a.077.077.0 01-.006.127 12.299 12.299.0 01-1.873.892.077.077.0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076.0 00.084.028 19.839 19.839.0 006.002-3.03.077.077.0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061.0 00-.031-.03zM8.02 15.33c-1.183.0-2.157-1.085-2.157-2.419.0-1.333.956-2.419 2.157-2.419 1.21.0 2.176 1.096 2.157 2.42.0 1.333-.956 2.418-2.157 2.418zm7.975.0c-1.183.0-2.157-1.085-2.157-2.419.0-1.333.955-2.419 2.157-2.419 1.21.0 2.176 1.096 2.157 2.42.0 1.333-.946 2.418-2.157 2.418z" />
                        </svg>
                        <span class="text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Discord</span>
                    </button>

                    <a href="<?= htmlspecialchars($contact['linkedin']) ?>" target=_blank class="contact-link flex items-center justify-center gap-3 p-4 rounded-lg bg-bg-primary-light dark:bg-bg-secondary-dark transition-all duration-300">
                        <svg class="w-7 h-7 text-text-secondary-light dark:text-text-secondary-dark shrink-0" fill="currentcolor" viewBox="0 0 24 24">
                            <path d="M20.47 2H3.53A1.45 1.45.0 002.06 3.43v17.14A1.45 1.45.0 003.53 22h16.94a1.45 1.45.0 001.47-1.43V3.43A1.45 1.45.0 0020.47 2zM8.09 18.74h-3v-9h3zM6.59 8.48a1.56 1.56.0 110-3.12 1.57 1.57.0 110 3.12zm12.32 10.26h-3v-4.83c0-1.21-.43-2-1.52-2A1.65 1.65.0 0012.85 13a2 2 0 00-.1.73v5h-3v-9h3V11a3 3 0 012.71-1.5c2 0 3.45 1.29 3.45 4.06z" />
                        </svg>
                        <span class="text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">LinkedIn</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>