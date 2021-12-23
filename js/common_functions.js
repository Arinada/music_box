function removeElementsByClass(className)
{
    const elements = document.getElementsByClassName(className);
    while (elements.length > 0) {
        elements[0].parentNode.removeChild(elements[0]);
    }
}

function renderAudioElements(data)
{
    if (data) {
        let newDiv = document.createElement("div");
        newDiv.className = 'audios-wrapper';
        document.body.lastChild.after(newDiv);
        newDiv.innerHTML += data;
        return true;
    }
    return false;
}