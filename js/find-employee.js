const searchJobTitleEle = document.querySelector("#job-title-input") 

const handleSearchJobTitle = () => {
    console.log(searchJobTitleEle.value);
}

const positionInputEle = document.querySelector("#position-input") 
const levelInputEle = document.querySelector("#level-input") 
const experienceInputEle = document.querySelector("#experience-input") 
const skillsInputEle = document.querySelector("#skills-input") 
const locationInputEle = document.querySelector("#location-input") 


const handleSubmitFilter = () => {
    console.log(positionInputEle.value)
    console.log(levelInputEle.value)
    console.log(experienceInputEle.value)
    console.log(JSON.parse(skillsInputEle.value).map(item => item.value).join(','))
    console.log(locationInputEle.value)
}