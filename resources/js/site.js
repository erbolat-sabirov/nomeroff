
document.querySelectorAll('.washing-element').forEach(element => {
    element.addEventListener('click', event => {
        event.preventDefault()
        let url = event.target.getAttribute('href')
        console.log(event.target)
        axios.get(url)
            .then(res => {
                document.getElementById('washing-form').innerHTML = res.data
            })
            .catch(err => {
                console.log(res)
            })
    })
})