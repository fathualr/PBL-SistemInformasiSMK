<script>
// Action Button
const buttons = document.querySelectorAll('.button');

const handleMouseEnter = (button) => {
    button.querySelector('.circle-1').classList.add('translate-x-4');
    button.querySelector('.circle-3').classList.add('-translate-x-4');
    button.querySelector('.circle-2').classList.add('animate-ping');
};

const handleMouseLeave = (button) => {
    clearTimeout(button.dataset.timer);
    button.querySelector('.circle-1').classList.remove('translate-x-4');
    button.querySelector('.circle-3').classList.remove('-translate-x-4');
    button.querySelector('.circle-2').classList.remove('animate-ping');
};

const handleClick = (button) => {
    if (!button.dataset.clicked || button.dataset.clicked === 'false') {
        button.dataset.clicked = 'true';
        button.querySelector('.fa-times').classList.remove('hidden');
        button.querySelector('.fa-times').classList.add('animate-pulse');
        button.querySelectorAll('.fa-circle').forEach(circle => circle.classList.add('hidden'));
    } else {
        button.dataset.clicked = 'false';
        button.querySelector('.fa-times').classList.add('hidden');
        button.querySelectorAll('.fa-circle').forEach(circle => circle.classList.remove('hidden'));
    }
};

buttons.forEach(button => {
    button.addEventListener('mouseenter', () => handleMouseEnter(button));
    button.addEventListener('mouseleave', () => handleMouseLeave(button));
    button.addEventListener('click', () => handleClick(button));
});

function rotateIcon() {
    var icon = document.getElementById('plus-icon');
    icon.classList.toggle('rotate-45');
}

// Password
document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("passwordInput");

    togglePassword.addEventListener("click", function() {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        if (type === "password") {
            togglePassword.classList.remove("fa-eye-slash");
            togglePassword.classList.add("fa-eye");
        } else {
            togglePassword.classList.remove("fa-eye");
            togglePassword.classList.add("fa-eye-slash");
        }
    });
});

// fungsi checkbox select all
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckboxes = document.querySelectorAll('#select-all, #select-all-footer');
    const itemCheckboxes = document.querySelectorAll('.select-item');

    selectAllCheckboxes.forEach(selectAllCheckbox => {
        selectAllCheckbox.addEventListener('change', function(e) {
            const isChecked = e.target.checked;
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });
    });
});
</script>