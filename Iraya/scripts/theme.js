const THEME = {
    LIGHT: 'light',
    DARK: 'night'
};

const theme = document.querySelector('#theme');
let currentTheme = localStorage.getItem('theme') ?? THEME.LIGHT;

function changeTheme() {
    if(!currentTheme)
        localStorage.setItem('theme', THEME.LIGHT);

    if(currentTheme == THEME.LIGHT) {
        currentTheme = THEME.DARK;
        localStorage.setItem('theme', THEME.DARK);
    }
    else {
        currentTheme = THEME.LIGHT;
        localStorage.setItem('theme', THEME.LIGHT);
    }

    theme.setAttribute('href',`./assets/stylesheets/${currentTheme}.css`);
}

theme.setAttribute('href',`./assets/stylesheets/${currentTheme}.css`);