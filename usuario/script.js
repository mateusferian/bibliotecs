const stars = document.querySelectorAll('.star');
const totalRatingsElement = document.getElementById('totalRatings');
const averageRatingElement = document.getElementById('averageRating');

let ratings = {
    1: 0,
    2: 0,
    3: 0,
    4: 0,
    5: 0
};

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-rating'));
        ratings[rating]++;

        let totalRatings = 0;
        let totalStars = 0;

        for (let i = 1; i <= 5; i++) {
            totalRatings += ratings[i];
            totalStars += ratings[i] * i;
        }

        const averageRating = totalStars / totalRatings;

        totalRatingsElement.textContent = totalRatings;
        averageRatingElement.textContent = averageRating.toFixed(1);

        updateStars(ratings);
    });
});

function updateStars(ratings) {
    let totalRatings = 0;
    let totalStars = 0;

    for (let i = 1; i <= 5; i++) {
        totalRatings += ratings[i];
        totalStars += ratings[i] * i;
    }

    const averageRating = totalStars / totalRatings;

    stars.forEach(star => {
        const rating = parseInt(star.getAttribute('data-rating'));
        if (rating <= averageRating) {
            star.classList.add('active');
        } else {
            star.classList.remove('active');
        }
    });
}
