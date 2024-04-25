






document.addEventListener("scroll", () => {
    


    document.querySelectorAll("#reassurance .scroll-move").forEach(element => {
        if (document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top < window.innerHeight / 2 && document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top + document.querySelector("#reassurance .timeline-trigger").offsetHeight > window.innerHeight / 2) {
            element.style.transform = "translateX(" + (((document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top - (window.innerHeight / 2)) * -1) / (document.querySelector("#reassurance .timeline-trigger").offsetHeight ) * 100) * -1 + "%)";
            element.querySelector("#timeline").style.width = (((document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top - (window.innerHeight / 2)) * -1) / (document.querySelector("#reassurance .timeline-trigger").offsetHeight ) * 100) + "%";
        }
        else if (document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top + document.querySelector("#reassurance .timeline-trigger").offsetHeight < window.innerHeight / 2) {
            element.style.transform = "translateX(-100%)";
            element.querySelector("#timeline").style.width = "100%";
        }
        else if (document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top > window.innerHeight / 2) {
            element.style.transform = "translateX(0%)";
            element.querySelector("#timeline").style.width = "0%";
        }
    });

    document.querySelectorAll(".point").forEach(element => {
        
        if (element.getBoundingClientRect().left < document.querySelector("main").getBoundingClientRect().width / 2 && element != document.querySelectorAll(".point")[0]) {
            element.classList.add("passed")
        }
        else if (element == document.querySelectorAll(".point")[0] && document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top < window.innerHeight / 2 && document.querySelector("#reassurance .timeline-trigger").getBoundingClientRect().top + document.querySelector("#reassurance .timeline-trigger").offsetHeight > window.innerHeight / 2) {
            element.classList.add("passed")
        }
        else {
            element.classList.remove("passed")
        }
    })

    

   

}, false);