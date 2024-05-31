@if(session()->has('error'))
<div role="alert" id="toast" class="alert alert-success col-span-9 mb-5">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>{{ session('success')}}</span>
    <button id="close-toast" class="ml-4 text-lg font-semibold text-black hover:text-gray-700 focus:outline-none">
        <i class="fas fa-times"></i>
    </button>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var toastElement = document.getElementById('toast');
            if (toastElement) {
                toastElement.style.transition = 'opacity 0.5s ease';
                toastElement.style.opacity = '0';
                setTimeout(function() {
                    toastElement.remove();
                }, 500);
            }
        }, 10000);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var closeButton = document.getElementById('close-toast');
        var toastElement = document.getElementById('toast');

        if (closeButton && toastElement) {
            closeButton.addEventListener('click', function() {
                toastElement.style.transition = 'opacity 0.5s ease';
                toastElement.style.opacity = '0';
                setTimeout(function() {
                    toastElement.remove();
                }, 500);
            });
        }
    });
</script>
@endif