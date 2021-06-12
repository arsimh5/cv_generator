var skillRowsId = 3;
var skillRows = 1;

window.addEventListener('DOMContentLoaded', (event) => {
  
    //add more education
    document.querySelector("#add-more-education").addEventListener("click", addEducationRow);

    //add more skills
    document.querySelector("#add-more-skills").addEventListener("click", addSkillRow);

    //add more experience
    document.querySelector("#add-more-experience").addEventListener("click", addExperienceRow);

    //print to pdf 
    document.querySelector("#print-cv").addEventListener("click", function(){

        document.querySelector("#add-more-education").style.display = "none";
        document.querySelector("#add-more-skills").style.display = "none";
        document.querySelector("#add-more-experience").style.display = "none";
        document.querySelector("#print-cv").style.display = "none";

        html2canvas(document.querySelector("#main-cv-content")).then(canvas => {
            Canvas2Image.saveAsPNG(canvas);
        })
    });
});

function addEducationRow(){

    let mainRow = document.createElement("div");
        mainRow.classList.add("row");

        let col1 = document.createElement("div");
            col1.classList.add("col-xs-12");
            col1.classList.add("col-sm-6");

            let col1Input = document.createElement("input");
                col1Input.setAttribute("type", "number");
                col1Input.setAttribute("placeholder", "Enter study years...");
                col1Input.classList.add("form-control");

            col1.append(col1Input);
        
        let col2 = document.createElement("div");
            col2.classList.add("col-xs-12");
            col2.classList.add("col-sm-6");

            let col2Input = document.createElement("input");
                col2Input.setAttribute("type", "text");
                col2Input.setAttribute("placeholder", "Enter school name..");
                col2Input.classList.add("form-control");

            col2.append(col2Input);

    mainRow.append(col1, col2);
    document.querySelector("#education-rows").append(mainRow);
}

function addSkillRow(){

    skillRows++;
    let mainRow = document.createElement("div");
        mainRow.classList.add("row");

        let radioChecksCol = document.createElement("div");
            radioChecksCol.classList.add("col-xs-12");
            radioChecksCol.classList.add("col-sm-8");

            skillRowsId++;
            let beginnerRadioDiv = document.createElement("div");
                beginnerRadioDiv.classList.add("form-check");
                beginnerRadioDiv.classList.add("form-check-inline");

                let beginnerRadioInput = document.createElement("input");
                    beginnerRadioInput.classList.add("form-check-input");
                    beginnerRadioInput.setAttribute("type", "radio");
                    beginnerRadioInput.setAttribute("name", `inlineRadioOptions${skillRows}`);
                    beginnerRadioInput.setAttribute("type", "radio");
                    beginnerRadioInput.setAttribute("id", `inlineRadio${skillRowsId}`)
                    beginnerRadioInput.value = "beginner";

                let beginnerRadioLabel = document.createElement("label");
                    beginnerRadioLabel.classList.add("form-check-label");
                    beginnerRadioLabel.setAttribute("for", `inlineRadio${skillRowsId}`)
                    beginnerRadioLabel.innerText = "Beginner";

            beginnerRadioDiv.append(beginnerRadioInput, beginnerRadioLabel);

            skillRowsId++;
            let intermediateRadioDiv = document.createElement("div");
                intermediateRadioDiv.classList.add("form-check");
                intermediateRadioDiv.classList.add("form-check-inline");

                let intermediateRadioInput = document.createElement("input");
                    intermediateRadioInput.classList.add("form-check-input");
                    intermediateRadioInput.setAttribute("type", "radio");
                    intermediateRadioInput.setAttribute("name", `inlineRadioOptions${skillRows}`);
                    intermediateRadioInput.setAttribute("type", "radio");
                    intermediateRadioInput.setAttribute("id", `inlineRadio${skillRowsId}`)
                    intermediateRadioInput.value = "intermediate";

                let intermediateRadioLabel = document.createElement("label");
                    intermediateRadioLabel.classList.add("form-check-label");
                    intermediateRadioLabel.setAttribute("for", `inlineRadio${skillRowsId}`)
                    intermediateRadioLabel.innerText = "Intermediate";

            intermediateRadioDiv.append(intermediateRadioInput, intermediateRadioLabel);

            skillRowsId++;
            let seniorRadioDiv = document.createElement("div");
                seniorRadioDiv.classList.add("form-check");
                seniorRadioDiv.classList.add("form-check-inline");

                let seniorRadioInput = document.createElement("input");
                    seniorRadioInput.classList.add("form-check-input");
                    seniorRadioInput.setAttribute("type", "radio");
                    seniorRadioInput.setAttribute("name", `inlineRadioOptions${skillRows}`);
                    seniorRadioInput.setAttribute("type", "radio");
                    seniorRadioInput.setAttribute("id", `inlineRadio${skillRowsId}`)
                    seniorRadioInput.value = "senior";

                let seniorRadioLabel = document.createElement("label");
                    seniorRadioLabel.classList.add("form-check-label");
                    seniorRadioLabel.setAttribute("for", `inlineRadio${skillRowsId}`)
                    seniorRadioLabel.innerText = "Senior";

            seniorRadioDiv.append(seniorRadioInput, seniorRadioLabel);
        
        radioChecksCol.append(beginnerRadioDiv, intermediateRadioDiv, seniorRadioDiv);

        let skillNameCol = document.createElement("div");
            skillNameCol.classList.add("col-xs-12");
            skillNameCol.classList.add("col-sm-4");

            let skillNameInput = document.createElement("input");
                skillNameInput.setAttribute("type", "text");
                skillNameInput.setAttribute("placeholder", "Skill name");
                skillNameInput.classList.add("form-control");
            
            skillNameCol.append(skillNameInput);

    mainRow.append(radioChecksCol, skillNameCol);
    document.querySelector("#skill-rows").append(mainRow);
}

function addExperienceRow(){

    let mainRow = document.createElement("div");
        mainRow.classList.add("row");

        let col1 = document.createElement("div");
            col1.classList.add("col-xs-12");
            col1.classList.add("col-sm-6");

            let col1Input = document.createElement("input");
                col1Input.setAttribute("type", "number");
                col1Input.setAttribute("placeholder", "Years of exp..");
                col1Input.classList.add("form-control");

            col1.append(col1Input);
        
        let col2 = document.createElement("div");
            col2.classList.add("col-xs-12");
            col2.classList.add("col-sm-6");

            let col2Input = document.createElement("input");
                col2Input.setAttribute("type", "text");
                col2Input.setAttribute("placeholder", "Role name..");
                col2Input.classList.add("form-control");

            col2.append(col2Input);

    mainRow.append(col1, col2);
    document.querySelector("#experience-rows").append(mainRow);
}

