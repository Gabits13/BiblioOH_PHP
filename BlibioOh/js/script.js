


const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.addEventListener("DOMContentLoaded", function () {
    const themeSwitcher = document.getElementById('themeSwitcher');
    const themeIcon = document.getElementById('themeIcon');

    // Função para alternar o tema
    function toggleTheme() {
        if (document.body.classList.contains('dark-mode')) {
            // Alterar para modo claro
            document.body.classList.remove('dark-mode');
            themeIcon.classList.replace('bi-moon', 'bi-sun');
            localStorage.setItem('theme', 'light'); // Salvar preferência no LocalStorage
        } else {
            // Alterar para modo escuro
            document.body.classList.add('dark-mode');
            themeIcon.classList.replace('bi-sun', 'bi-moon');
            localStorage.setItem('theme', 'dark'); // Salvar preferência no LocalStorage
        }
    }

    // Adicionar evento de clique ao botão
    themeSwitcher.addEventListener('click', toggleTheme);

    // Verificar o tema salvo no LocalStorage ao carregar a página
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeIcon.classList.replace('bi-sun', 'bi-moon');
    } else {
        document.body.classList.remove('dark-mode');
        themeIcon.classList.replace('bi-moon', 'bi-sun');
    }
});
