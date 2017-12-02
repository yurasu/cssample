<?php

/* form.html */
class __TwigTemplate_789d70839179485caf65228cbdb1f8cb1ce85a24825f6327e59669fb049e2e73 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ja\">
<head>
<meta charset=\"UTF-8\" />
<title>MyEntry</title>
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"js/validate.js\"></script>
</head>
<body>
\t<form id=\"myform\" method=\"post\" action=\"./\">
\t\t<p>
\t\t<div id='message_id'></div>
\t\t<label>Husehoid ID：<input type=\"text\" name=\"id\" size=\"40\"></label>
\t\t</p>
\t\t<fieldset>
\t\t\t<div id='message_age'></div>

\t\t\t<legend>AGE</legend>
\t\t\t<p>
\t\t\t\t<label>AGE：<input type=\"text\" name=\"age\" size=\"40\"></label>
\t\t\t</p>
\t\t</fieldset>

\t\t<fieldset>
\t\t\t<div id='message_sex'></div>
\t\t\t<legend>SEX</legend>
\t\t\t<p>
\t\t\t\t<label><input type=\"radio\" name=\"sex\" value=\"1\" checked>Male</label>
\t\t\t</p>
\t\t\t<p>
\t\t\t\t<label><input type=\"radio\" name=\"sex\" value=\"2\">Female</label>
\t\t\t</p>
\t\t</fieldset>
\t\t<fieldset>
\t\t\t<div id='message_married'></div>

\t\t\t<legend>Marital Status</legend>
\t\t\t<p>
\t\t\t\t<label><input type=\"radio\" name=\"married\" value=\"1\" checked>Married</label>
\t\t\t</p>
\t\t\t<p>
\t\t\t\t<label><input type=\"radio\" name=\"married\" value=\"2\">Not Married</label>
\t\t\t</p>
\t\t</fieldset>
\t\t<fieldset>
\t\t\t<legend>HOUSEHOLD INFORMATION</legend>

\t\t\t<fieldset>
\t\t\t\t<div id='message_housing'></div>

\t\t\t\t<legend>Type Housing</legend>
\t\t\t\t<p>
\t\t\t\t\t<label><input type=\"radio\" name=\"housing\" value=\"1\" checked>Single
\t\t\t\t\t\tfamily</label>
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\t<label><input type=\"radio\" name=\"housing\" value=\"2\">Multi-family</label>
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\t<label><input type=\"radio\" name=\"housing\" value=\"3\">Homeless</label>
\t\t\t\t</p>
\t\t\t</fieldset>

\t\t\t<fieldset>
\t\t\t\t<div id='message_roof'></div>

\t\t\t\t<legend>Type Roof</legend>
\t\t\t\t<p>
\t\t\t\t\t<label><input type=\"radio\" name=\"roof\" value=\"1\" checked>Wood</label>
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\t<label><input type=\"radio\" name=\"roof\" value=\"2\">Metal</label>
\t\t\t\t</p>
\t\t\t\t<p>
\t\t\t\t\t<label><input type=\"radio\" name=\"roof\" value=\"3\">Other</label>
\t\t\t\t</p>
\t\t\t</fieldset>

\t\t</fieldset>
\t\t<button type=\"submit\">Submit</button>
\t</form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "form.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "form.html", "/var/www/html/cs_sample/templates/form.html");
    }
}
