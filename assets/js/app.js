console.log('inside app js');
const tableRows = document.querySelectorAll('.clickable-row');
console.log('tableRows', tableRows);
tableRows.forEach(row => {
    row.addEventListener('click', function(){
        console.log(this);
    })
});