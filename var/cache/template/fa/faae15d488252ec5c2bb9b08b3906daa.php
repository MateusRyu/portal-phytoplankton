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

/* pages/user/login.html.twig */
class __TwigTemplate_7d54e4c4374523a65c30a0d811b491fb extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
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
        $context["title"] = "Entrar na plataforma";
        // line 4
        $context["loginActivated"] = "actived";
        // line 1
        $this->parent = $this->loadTemplate("templates/default.html.twig", "pages/user/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<article class=\"form container\">
    <div class=\"card border-secundary mb-3 mt-4\" style=\"max-width: 40vw; margin: auto;\">
        <h1 class=\"card-header h4\">Entrar na plataforma</h1>
        <section class=\"card-body\">
            ";
        // line 11
        if (($context["alert"] ?? null)) {
            // line 12
            echo "                <div class=\"alert alert-dismissible alert-danger\">                    
                    <i data-feather=\"alert-triangle\"></i>
                    ";
            // line 14
            echo ($context["alert"] ?? null);
            echo "
                </div>
            ";
        }
        // line 17
        echo "            <form action=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/login\" method=\"post\">
                <div class=\"form-group mb-2\">
                    <label for=\"userEmail\" class=\"form-label\">E-mail</label>
                    <input autocomplete=\"username\" type=\"email\" class=\"form-control\" id=\"userEmail\" name='email' placeholder=\"seu.email@gmail.com\" required>
                </div>
                
                <div class=\"form-group mb-2\">
                    <label for=\"userPassword\" class=\"form-label\">Senha</label>
                    <input autocomplete=\"current-password\" type=\"password\" class=\"form-control\" id=\"userPassword\"  name='password' placeholder=\"Insira a sua senha\" required>
                    ";
        // line 29
        echo "                </div>
                <div class=\"form-group mx-2\">
                    <input type=\"checkbox\" onclick=\"passwordVisibility()\">&nbsp;Exibir senha<br>
                    <input type=\"checkbox\" name=\"rememberUser\" id=\"rememberUser\" value='1' />
                    <label for=\"rememberUser\">Lembrar identificação de usuário</label>
                </div>
                <br>
                <input type=\"submit\" value=\"Entrar\" name=\"NormalBehavior\">
            </form>
            <hr>
            <section>
                <p>Ainda não possui uma conta?<br><a href=\"";
        // line 40
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/criar-conta\">Cadastre-se!</a></p>
            </section>
        </section>
    </div>
</article>
";
    }

    // line 46
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/vendor/feather-icons/feather.min.js\"></script>
    <script>
        function passwordVisibility() {
            const passwordInput = document.getElementById('userPassword');
            if (passwordInput.type === \"password\") {
                passwordInput.type = \"text\";
            } else {
                passwordInput.type = \"password\";
            }
        }
        feather.replace()
    </script>
";
    }

    public function getTemplateName()
    {
        return "pages/user/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 47,  110 => 46,  100 => 40,  87 => 29,  74 => 17,  68 => 14,  64 => 12,  62 => 11,  56 => 7,  52 => 6,  47 => 1,  45 => 4,  43 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/user/login.html.twig", "/shared/httpd/portal/app/views/pages/user/login.html.twig");
    }
}
