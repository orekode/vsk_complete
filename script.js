// Function to animate direction
function d1_ani(direction){
    if(direction == "out"){
        document.querySelector(".wrap").classList.add("opa0");
        document.querySelector(".wrap").classList.add("pl");
        toggle_items(".pic");
    }
    else{
        document.querySelector(".wrap").classList.remove("opa0");
        document.querySelector(".wrap").classList.remove("pl");
        remove_items(".pic");
    }
}

// Function to switch pages
function page_switch(number){
    console.log("here");

    // Remove active classes for certain elements
    if(number == "3" || number == "1"){
        document.querySelector(".box").classList.remove("active");
        document.querySelector(".image2").classList.remove("active");
    }

    setTimeout(() => {
        if (number == "1"){
            // Display page 1 elements
            add_items(".d1");
            remove_items(".d2");
            remove_items(".d3");

            add_items(".t1");
            remove_items(".t2");
            remove_items(".t3");
        }
        else if(number == "2"){
            // Display page 2 elements
            add_items(".d2");
            remove_items(".d1");
            remove_items(".d3");

            setTimeout(() => {
                // Add active classes after a delay
                document.querySelector(".box").classList.add("active");
                document.querySelector(".image2").classList.add("active");
            }, 500);

            add_items(".t2");
            remove_items(".t1");
            remove_items(".t3");
        }
        else if(number == "3"){
            // Display page 3 elements
            add_items(".d3");
            remove_items(".d2");
            remove_items(".d1");

            add_items(".t3");
            remove_items(".t2");
            remove_items(".t1");
        }
    }, 1500);
}

// Function to toggle items
function toggle_items(item_name){
    element = document.querySelector(item_name);
    element.classList.toggle("active");
}

// Function to add active class to items
function add_items(item_name){
    element = document.querySelector(item_name);
    element.classList.add("active");
}

// Function to remove active class from items
function remove_items(item_name){
    element = document.querySelector(item_name);
    element.classList.remove("active");
}

// Function to switch between cards
function switch_cards(card_number){
    console.log("here");

    if(card_number == "1"){
        add_items(".card1");
        remove_items(".card2");
    }
    else{
        remove_items(".card1");
        add_items(".card2");
    }
}
