 const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');

    hamburger.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
        const isCollapse = sidebar.classList.contains('collapsed');
        hamburger.textContent = isCollapse ? '☰' : '✕';
        hamburger.setAttribute('aria_expanded',isCollapse);
    });