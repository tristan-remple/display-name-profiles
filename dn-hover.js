(function(){

    const hoverContent = document.getElementById("dn-hover")
    const nameDisplay = document.getElementById("dn-link")

    function show() {
        hoverContent.classList.remove("hidden")
    }

    function hide() {
        hoverContent.classList.add("hidden")
    }

    nameDisplay.addEventListener("mouseover", show)
    nameDisplay.addEventListener("mouseout", hide)

})()