function updateWashingCars() {
    
    let url = document.querySelector('#washing-list').getAttribute('data-url')

    axios.get(url)
        .then(res => {
            document.getElementById('washing-list').innerHTML = res.data
            editCarParams()
        })
        .catch(err => {
            console.log(err)
        })
}

function editCarParams() {
    document.querySelectorAll('.washing-element').forEach(element => {
        element.addEventListener('click', event => {
            event.preventDefault()
            console.log(event)
            let url = event.target.getAttribute('href')
            axios.get(url)
                .then(res => {
                    document.getElementById('washing-form').innerHTML = res.data
                })
                .catch(err => {
                    console.log(res)
                })
        })
    })
}

setInterval(() => {
    updateWashingCars()
}, 5000)

editCarParams()