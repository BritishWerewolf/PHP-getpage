function get_page($options = "", $page = null)
{
    preg_match("/^https?/", $page, $scheme);
    $scheme = $scheme[0] ?? null;
    $scheme = !empty($scheme) ? $scheme : (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ? "https" : "http");
    $self = "{$scheme}://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}";
    
    if (empty($options)) {
        return $self;
    }
    
    $options = str_split($options);
    $page = (empty($page)) ? $self : $page;

    if (in_array("a", $options)) $page = substr($page, strrpos($page, "/") + 1);
    if (in_array("b", $options)) $page = substr($page, 0, strrpos($page, ".php"));
    if (in_array("c", $options)) $page = empty(substr($page, 0, strrpos($page, "?"))) ? $page : substr($page, 0, strrpos($page, "?"));
    if (in_array("d", $options)) $page = (strpos($page, "?")) ? substr($page, strrpos($page, "?") + 1) : "";
    if (in_array("e", $options)) $page = strpos(parse_url($page, PHP_URL_HOST), ".") === false ? parse_url($page, PHP_URL_HOST) : substr(parse_url($page, PHP_URL_HOST), strpos(parse_url($page, PHP_URL_HOST), ".") + 1, strlen(parse_url($page, PHP_URL_HOST)) - strpos(parse_url($page, PHP_URL_HOST), ".", strpos(parse_url($page, PHP_URL_HOST), ".") + 1) + strpos(parse_url($page, PHP_URL_HOST), "."));
    if (in_array("f", $options)) $page = ($page == $self) ? "{$scheme}://{$_SERVER["SERVER_NAME"]}" : "{$scheme}://".(strpos($page, $scheme) === false ? parse_url("{$scheme}://{$page}")["host"] : parse_url($page)["host"]);
    if (in_array("g", $options)) $page = substr($page, 0, strrpos($page, "/"));

    return $page;
}
