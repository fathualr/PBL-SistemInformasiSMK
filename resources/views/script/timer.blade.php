<script>
document.addEventListener('DOMContentLoaded', (event) => {
    var countdownStartDate = new Date("{{ $countdownStart }}").getTime();
    var countdownEndDate = new Date("{{ $countdownEnd }}").getTime();

    var updateCountdown = function(distance) {
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;
    };

    var formContainer = document.getElementById("form-container");

    var countdownToStart = setInterval(function() {
        var now = new Date().getTime();
        var distanceToStart = countdownStartDate - now;

        if (distanceToStart > 0) {
            updateCountdown(distanceToStart);
        } else {
            clearInterval(countdownToStart);
            formContainer.style.display = "block"; // Tampilkan form ketika waktu mulai tercapai

            var countdownToEnd = setInterval(function() {
                var now = new Date().getTime();
                var distanceToEnd = countdownEndDate - now;

                if (distanceToEnd > 0) {
                    updateCountdown(distanceToEnd);
                } else {
                    clearInterval(countdownToEnd);
                    updateCountdown(0);
                    formContainer.style.display =
                    "none"; // Sembunyikan form ketika waktu akhir tercapai
                }
            });
        }
    }, 1000);
});
</script>