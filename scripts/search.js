let root = "http://vskuul.com/school";

async function search_records(target, params) {

    const formData = new FormData();

    Object.keys(params).forEach( item => {
        formData.append(item, params[item]);
    })

    const response = await fetch(target, {
        method: 'POST',
        body: formData,
    });

    if (!response.ok) {
        throw new Error('Network response was not ok');
    }

    const data = await response.json();
    
    return data
}

function trigger_search(search_event, target = "/search/school.php", key="name") {
    let search = search_event.target.value;
    let result_box = document.querySelector(".vsk_root .search-result");
    let loader = document.querySelector(".vsk_root .search-result .loading");

    if (search.length <= 0) {
        result_box.classList.remove("active");
        result_box.classList.remove("visible");
        return;
    }

    result_box.classList.add("active");
    setTimeout(() => result_box.classList.add("visible"), 100);

    loader.classList.add("active");

    result = result_box.querySelector(".result");
    result.innerHTML = ""

    search_records(root + target, {search}).then( schools => {
        console.log(schools);
        schools.forEach( school => result.innerHTML += `
            <div onclick=" location.href = './school.php?school=${school.id}'; " class="school" style="font-weight: bold; padding: 0.75rem 1rem; cursor: pointer; ${school.id != schools[schools.length - 1].id ? "border-bottom: 1px solid lightgray;" : ""}">
                ${school[key]}
            </div>
        `)

        if(schools.length <= 0) {
            result.innerHTML += `
            <div class="school" style="font-weight: bold; padding: 0.75rem 1rem; cursor: pointer;">
                No results Found
            </div>`
        }
        loader.classList.remove("active");
    });

}

function debounce(func, delay) {
    let timeoutId;
    
    return function (...args) {
        
        clearTimeout(timeoutId);
        
        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
        
    };
}

const debouncedSearch = debounce(trigger_search, 300);

