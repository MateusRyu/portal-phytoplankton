<?php

use App\Http\Router;

// Router::addRoute('/path/{number:id}/{words:name}/{mixed:message}', array(
//     'method' => 'get', // Or use method alias method, like: Router::addRouteGet();
//     'httpCode' => 200,
//     'controller' => 'ControllerName',
//     'action' => 'ActionName'
// ), ['thirdMiddleware', 'secondMiddleware', 'firstMiddleware']);

Router::addRouteGet('/', array(
    'httpCode' => 200,
    'controller' => 'PagesController',
    'action' => 'home'
));

Router::addRouteGet('/sobre', array(
    'httpCode' => 200,
    'controller' => 'PagesController',
    'action' => 'about'
));

Router::addRouteGet('/api/map', array(
    'httpCode' => 200,
    'controller' => 'ApiController',
    'action' => 'map'
), ['PrepareDatabase']);

Router::addRouteGet('/sem-sessao', array(
    'httpCode' => 200,
    'controller' => 'PagesController',
    'action' => 'sessionNotFound'
));

Router::addRouteGet('/criar-conta', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'createAccount'
), ['IsLoggedOut', 'PrepareDatabase']);

Router::addRoutePost('/criar-conta', array(
    'httpCode' => 201,
    'controller' => 'UserController',
    'action' => 'confirmCreateAccount'
), ['IsLoggedOut', 'PrepareDatabase']);

Router::addRouteGet('/login', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'login'
), ['IsLoggedOut', 'PrepareDatabase']);

Router::addRoutePost('/login', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'validateLogin'
), ['IsLoggedOut', 'PrepareDatabase']);

Router::addRouteGet('/logout', array(
    'httpCode' => 301,
    'controller' => 'UserController',
    'action' => 'logout'
));

Router::addRouteGet('/termos/responsabilidades-do-usuario', array(
    'httpCode' => 200,
    'controller' => 'PagesController',
    'action' => 'showStatementOfResponsibility'
));

Router::addRouteGet('/termos/politica-de-privacidade' , array(
    'httpCode' => 200,
    'controller' => 'PagesController',
    'action' => 'showPrivacyPolicy'
));

Router::addRouteGet('/registros', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'showRegisters'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/rascunhos', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'showDraftRegisters'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/em-curadoria', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'showCuratedRegisters'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/aprovados', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'showApprovedRegisters'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/rejeitados', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'showDisapprovedRegisters'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/novo', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'formRegister'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/registros/salvar', array(
    'httpCode' => 201,
    'controller' => 'RegisterController',
    'action' => 'saveRegister'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/editar', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'formEditRegister'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/excluir', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'deleteRegister'
), ['IsRegisterOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:registerId}/amostra/{number:sampleId}/excluir', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'deleteSample'
), ['IsRegisterOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/registros/{number:idRegistro}/atualizar', array(
    'httpCode' => 201,
    'controller' => 'RegisterController',
    'action' => 'updateRegister'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/registros/{number:idRegistro}/alterar', array(
    'httpCode' => 201,
    'controller' => 'RegisterController',
    'action' => 'editRegister'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/amostras', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'showSample'
), ['IsRegisterOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/amostra/cadastro-manual', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'formSampleManual'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/amostra/cadastro-automatico', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'formSampleAutomatic'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/amostra/{number:idAmostra}/editar', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'showFormEditSample'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/enviar-para-curadoria', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'sendAllToCurate'
), ['IsRegisterOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/amostra/{number:idAmostra}/enviar-para-curadoria', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'sendToCurate'
), ['IsLoggedIn', 'IsRegisterOwner', 'PrepareDatabase']);

Router::addRoutePost('/registros/{number:idRegistro}/adicionar-amostra/manual', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'insertSampleFromForm'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/curadoria', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'showSamplesToCurate'
), ['IsCurator', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/aprovar', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'approveSample'
), ['IsCurator', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/rejeitar', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'rejectSample'
), ['IsCurator', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/atualizar-capa', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'updateCover'
), ['isSampleOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/deletar-capa', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'deleteCover'
), ['isSampleOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/atualizar-imagem/{number:fitoplanctonId}', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'updateImage'
), ['isSampleOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/deletar-imagem/{number:fitoplanctonId}', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'deleteImage'
), ['isSampleOwner', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/amostra/{number:sampleId}/atualizar', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'updateSample'
), ['isSampleOwner', 'IsLoggedIn', 'PrepareDatabase']);


Router::addRouteGet('/usuario/configuracao', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'configureUserAccount'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/usuario/atualizar', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'updateAccount'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/usuarios', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'showUsers'
), ['IsAdministrator', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/usuario/{number:userId}/alterar-cargo', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'changeRole'
), ['IsAdministrator', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/usuario/{number:userId}/banir', array(
    'httpCode' => 200,
    'controller' => 'UserController',
    'action' => 'banUser'
), ['IsAdministrator', 'IsLoggedIn', 'PrepareDatabase']);

Router::addRoutePost('/registros/{number:idRegistro}/adicionar-amostra/auto', array(
    'httpCode' => 200,
    'controller' => 'SampleController',
    'action' => 'insertSampleFromFile'
), ['IsLoggedIn', 'PrepareDatabase']);

Router::addRouteGet('/registros/{number:idRegistro}/exibir', array(
    'httpCode' => 200,
    'controller' => 'RegisterController',
    'action' => 'showRegister'
), ['PrepareDatabase']);