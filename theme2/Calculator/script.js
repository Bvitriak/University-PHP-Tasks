document.addEventListener('DOMContentLoaded', () => {
    const display = document.getElementById('display');
    const buttons = document.querySelectorAll('button');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const action = button.dataset.action;

            fetch('calculator.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=${encodeURIComponent(action)}`, 
            })
            .then(response => response.text())
            .then(result => {
                display.value = result;
            })
            .catch(() => {
                display.value = 'Ошибка'; 
            });
        });
    });
});