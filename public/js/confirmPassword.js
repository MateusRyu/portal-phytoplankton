const attackSpeedPerSecond = {slow: 10**5,fast: 10**12};
const colors = [
    'red',
    '#e3342f',
    '#f6993f',
    '#00AB08',
    '#38c172', 
    '#4dc0b5', 
    '#3490dc'
];
const barWidths = ['100%','16.6%','33.3%','50%', '66.6%', '83.3%', '100%'];
const passwordStrengthLabels = [
    'Senha vulnerável',
    'Senha fraco',
    'Senha mediana',
    'Senha boa',
    'Senha ótima',
    'Senha segura',
    'Senha bem segura'
];
const lowerCaseRegex = new RegExp("[a-z]+");
const upperCaseRegex = new RegExp("[A-Z]+");
const numbersRegex = new RegExp("[0-9]+");
const symbolsRegex = new RegExp("[^a-zA-Z0-9]+");

window.onload = function(){
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const message = document.getElementById('message');
    const passwordBar = document.getElementById('passwordBar');
    const submit = document.getElementById('submit');

    function getTimeToCrackInSeconds(password){
        var passwordComplexity = 0;
        passwordComplexity += lowerCaseRegex.exec(password)?26:0;
        passwordComplexity += upperCaseRegex.exec(password)?26:0;
        passwordComplexity += numbersRegex.exec(password)?10:0;
        passwordComplexity += symbolsRegex.exec(password)?30:0;
        var possibilities = passwordComplexity**password.length;
        var timeToCrackInSeconds = {
            slow: possibilities/attackSpeedPerSecond.slow,
            fast: possibilities/attackSpeedPerSecond.fast
        };
        return(timeToCrackInSeconds);
    }
    
    function calculatePasswordStrength(password){
        timeToCrackInSeconds = getTimeToCrackInSeconds(password);
        if (timeToCrackInSeconds.slow < (60*60*24*30*6)){
            return(0);
        } else if (timeToCrackInSeconds.slow < (60*60*24*30*12)){
            return(1);
        } else if (timeToCrackInSeconds.fast < (60*60*24*30*1)){
            return(2);
        } else if (timeToCrackInSeconds.fast < (60*60*24*30*3)){
            return(3);
        } else if (timeToCrackInSeconds.fast < (60*60*24*30*6)){
            return(4);
        } else if (timeToCrackInSeconds.fast < (60*60*24*30*12)){
            return(5);
        }
        return(6);
    }

    function confirm() {
        if (password.value == ''){
            submit.type = 'button';
            passwordBar.style.background = '#e9ecef';
            passwordBar.innerHTML = '';
            message.innerHTML = 'Força da senha';
            return;
        } else {
            var passwordStrength = calculatePasswordStrength(password.value);
            passwordBar.style.background = colors[passwordStrength];
            passwordBar.style.width = barWidths[passwordStrength];
            passwordBar.innerHTML = passwordStrengthLabels[passwordStrength];
            message.innerHTML = '&nbsp;'+'Força da senha';
            
            if (passwordStrength == 0){
                submit.type = 'button';
            } else {
                if (password.value == confirmPassword.value) {
                    submit.type = 'submit';
                } 
                if (confirmPassword.value != '' && password.value != confirmPassword.value) {
                    passwordBar.style.width = barWidths[0];
                    passwordBar.style.background = colors[0];
                    passwordBar.innerHTML = '';
                    message.innerHTML = 'Erro:';
                    passwordBar.innerHTML = '&nbsp;'+'Senhas não são iguais';
                    submit.type = 'button';
                }
            }
        }
    }

    password.addEventListener('keyup', confirm, false);
    confirmPassword.addEventListener('keyup', confirm, false);
}