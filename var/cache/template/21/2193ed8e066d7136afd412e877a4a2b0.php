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

/* pages/home/sessionNotFound.html.twig */
class __TwigTemplate_b42306cf9a2449ffa6c6ee0607b4948b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
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
        $context["title"] = "Sessão expirada";
        // line 1
        $this->parent = $this->loadTemplate("templates/default.html.twig", "pages/home/sessionNotFound.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"card mx-auto mt-4 mb-4\" style=\"width: 40vw;\">
      <div class=\"card-header\">
        Erro de sessão.
      </div>
      <div class=\"card-body\">
        <span class=\"card-text\">
          <p>
            A sua sessão de conexão com o site não foi encontrado. 
            Talvez você esteja tentando acessar àreas restristas 
            sem realizar o login ou talvez tenha passado muito tempo
            após ter realizado o login. 
          </p>
          <p>
              Por favor, realize o login novamente ou volte à página inicial.
          </p>
        </span>
        <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/\" class=\"btn btn-primary\">Página inicial</a>
        <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, ($context["SITE_URL"] ?? null), "html", null, true);
        echo "/login\" class=\"btn btn-primary\">Login</a>
      </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "pages/home/sessionNotFound.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 23,  71 => 22,  53 => 6,  49 => 5,  44 => 1,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/home/sessionNotFound.html.twig", "/shared/httpd/portal/app/views/pages/home/sessionNotFound.html.twig");
    }
}
