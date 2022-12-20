<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* pages/user/createAccount.html.twig */
class __TwigTemplate_364e6ddf0f98b31607c5324e735a5f2f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "templates/default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        $context["title"] = "Criar conta de usuário";
        // line 4
        $context["loginActivated"] = "actived";
        // line 1
        $this->parent = $this->loadTemplate("templates/default.html.twig", "pages/user/createAccount.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/js/confirmPassword.js\"></script>
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "<article class=\"card border-secundary mb-3 mt-4 mx-auto col-5\">
    <h1 class=\"card-header h4\">Formulário de cadastro</h1>
    <section class=\"card-body\">
        ";
        // line 14
        if ((($context["alert"] ?? null) == "email already exist")) {
            // line 15
            echo "            <div class=\"alert alert-danger alert-dismissible fade show\"  role=\"alert\">
                <span>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                    E-mail já está sendo usado!
                </span>
            </div>
        ";
        }
        // line 22
        echo "        <form action=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/criar-conta\" method=\"post\">
            <div class=\"mt-2\">
                <label for=\"username\" class=\"form-label\">Nome</label>
                <input type=\"text\" class=\"form-control\" id=\"username\" name='username' placeholder=\"Seu Nome Completo\" autocomplete=\"name\" maxlength=\"50\" required>
            </div>
            <div class=\"mt-2\">
                <label for=\"email\" class=\"form-label\">E-mail</label>
                <input type=\"email\" class=\"form-control\" id=\"email\" name='email' placeholder=\"seu.email@gmail.com\" autocomplete=\"username\" maxlength=\"255\" required>
            </div>
            <div class=\"mt-2\">
                <label for=\"password\" class=\"form-label\">
                    Senha 
                    <button type=\"button\" class=\"btn btn-sm px-1 py-0 btn-outline-info\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
                    ?
                    </button>
                    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-lg\">
                        <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Senha</h1>
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                        </div>
                        <div class=\"modal-body\">
                            <p>
                                A senha pode ser formada por qualquer tipo de caracteres (letras, números ou símbolos). 
                                A única limitação é que a senha deve ser longa ou complexa o suficiente para ser considerada 
                                segura. Apesar de não ser recomendado, a plataforma não te impede de usar dados pessoais 
                                (como nome, idade, e-mail, etc) na senha ou utilizar senhas comuns (tais como \"felicidade\",
                                \"minhasenha\", \"senha123\", \"123mudar\"). Cabe ao usuário decidir uma senha adequada para não 
                                ter a conta roubada. É recomendado que use uma senha aleatória e única para acessar esta conta.
                            </p>
                            <p>
                                A força da senha é calculado com base no tempo em que uma máquina levaria para acertar 
                                a senha através de <a target=\"_blank\" href=\"https://pt.wikipedia.org/wiki/Ataque_de_for%C3%A7a_bruta\">força bruta</a>. 
                                Cada classificação leva em conta o investimento no equipamento do atacante, no tempo gasto e considerando 
                                que o atacante tem acesso direto à sua senha, assim como listado em baixo:
                            </p>
                            <ul>
                                <li><strong>Senha vulnerável:</strong> Menos de 6 meses com equipamento lento<li>
                                <li><strong>Senha fraco:</strong> Menos de 12 meses com equipamento lento<li>
                                <li><strong>Senha mediana:</strong> Menos de 1 meses com equipamento rápido<li>
                                <li><strong>Senha boa:</strong> Menos de 3 meses com equipamento rápido<li>
                                <li><strong>Senha ótima:</strong> Menos de 6 meses com equipamento rápido<li>
                                <li><strong>Senha segura:</strong> Menos de 12 meses com equipamento rápido<li>
                                <li><strong>Senha bem segura:</strong> Mais de 12 meses com equipamento rápido<li>
                            </ul>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>

                </label>
                <input type=\"password\" class=\"form-control\" id=\"password\"  name='password' placeholder=\"Insira a sua senha\" autocomplete=\"current-password\" maxlength=\"255\" required>
            </div>
            <div class=\"mt-2\">
                <label for=\"confirmPassword\" class=\"form-label\">Confirme sua senha</label>
                <input type=\"password\" class=\"form-control\" id=\"confirmPassword\" name='confirmPassword' placeholder=\"Digite a sua senha novamente\" autocomplete=\"current-password\" maxlength=\"255\" required>
            </div>

            <small id=\"message\">Força da senha</small>
            <div class=\"progress\" style=\"height:18px;margin:5px;\">
                <div id=\"passwordBar\"class=\"progress-bar\"></div>
            </div>
            <small>
                Já possui uma conta? <br>
                <a href=\"";
        // line 90
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/login\">Faça login.</a>
            </small>
            <hr>
            <div class=\"form-check mb-2\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"privacyPolicy\" required>
                <label class=\"form-check-label\" for=\"privacyPolicy\">
                    Li e concordo com a  
                    <a data-bs-toggle=\"modal\" href=\"#\" data-bs-target=\"#staticBackdrop\">política de privacidade</a>
                     da plataforma.
                </label>
            </div>
            <input id=\"submit\" class=\"btn btn-primary\" type=\"submit\" value=\"Finalizar cadastro\">
        </form>        
    </section>
</article>

<div class=\"modal fade\" id=\"staticBackdrop\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\" style=\"width: 50vw;\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h1 class=\"modal-title fs-5\" id=\"staticBackdropLabel\">política de privacidade</h1>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
              A política de privacidade também pode ser acessado no seguinte link: 
              <a href=\"";
        // line 115
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/termos/politica-de-privacidade\" target=\"_blank\" rel=\"noopener noreferrer\">
              política de privacidade</a>.
              <hr>
              ";
        // line 118
        echo twig_include($this->env, $context, "pages/terms/privacy-policy-2022.html.twig");
        echo "
            </div>
            <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Não concordo</button>
              <button type=\"submit\" class=\"btn btn-primary\">Concordo</button>
            </div>
          </div>
        </div>
      </div>
";
    }

    public function getTemplateName()
    {
        return "pages/user/createAccount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 118,  183 => 115,  155 => 90,  83 => 22,  74 => 15,  72 => 14,  67 => 11,  63 => 10,  56 => 7,  52 => 6,  47 => 1,  45 => 4,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/user/createAccount.html.twig", "/shared/httpd/portal/app/views/pages/user/createAccount.html.twig");
    }
}
