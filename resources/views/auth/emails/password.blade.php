Clique aqui para redefinir sua senha: {{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}
