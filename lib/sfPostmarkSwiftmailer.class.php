<?php

/**
 * @class sfPostmarkSwiftmailer
 * We could use Swift_PostmarkTransport as-is if it supported
 * DI properly like the standard transports of Swiftmail do, but it's
 * missing a few things, like the ability to create one without
 * arguments and then call setters, which Symfony depends on to figure
 * out what options it can pass
 */

class sfPostmarkSwiftmailer extends Swift_PostmarkTransport
{
  public function __construct()
  {
    // Dummy Postmark API key until the setters get called
    parent::__construct('CONFIGUREME');
  }
  public function setPostmarkApiToken($token)
  {
    $this->postmark_api_token = $token;
  }
  public function getPostmarkApiToken()
  {
    return $this->postmark_api_token;
  }
  public function setFrom($from)
  {
    $this->postmark_from_signature = $from;
  }
  public function getFrom()
  {
    return $this->postmark_from_signature;
  }
  public function setPostmarkUri($postmark_uri)
  {
    $this->postmark_uri = $postmark_uri;
  }
  public function getPostmarkUri()
  {
    return $this->postmark_uri;
  }
}
