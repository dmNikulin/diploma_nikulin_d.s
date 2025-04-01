const btn = document.querySelector('.btn');
const btn2 = document.querySelector('.btn2');

btn.addEventListener('click', function() {
    gridRealize(sortAscending(dataB));
})

btn2.addEventListener('click', function() {
    gridRealize(sortAscending(dataB).reverse());
})

function sortAscending() {
    const newArray = [];
    dataB.forEach(element => {
        newArray.push(element.price);
    });
    newArray.sort((a, b) => a - b);
    const doneArray = [];
    for (let i = 0; i < newArray.length; i++) {
        for (let j = 0; j < dataB.length; j++) {
            if (dataB[i].price == newArray[j]) {
                doneArray.push(dataB[j]);
            }
        }
    }
    return doneArray;
}