document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('keyup', function () {
        var filter = searchInput.value.toUpperCase();
        var dishesByType = document.querySelectorAll('.dish-item');

        // Loop through dishes to hide/show based on filter
        for (var i = 0; i < dishesByType.length; i++) {
            var dishItem = dishesByType[i];
            var dishName = dishItem.querySelector('.dish-name');
            var dishNumber = dishItem.querySelector('.dish-number');

            if (dishName && dishNumber) {
                var txtNameValue = dishName.textContent || dishName.innerText;
                var txtNumberValue = dishNumber.textContent || dishNumber.innerText;
                if (txtNameValue.toUpperCase().indexOf(filter) > -1 || txtNumberValue.toUpperCase().indexOf(filter) > -1) {
                    dishItem.classList.remove('hidden'); // Show the dish container
                } else {
                    dishItem.classList.add('hidden'); // Hide the dish container
                }
            }
        }
    });
});
