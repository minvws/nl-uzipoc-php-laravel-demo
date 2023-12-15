<?php

declare(strict_types=1);

namespace App\Services\Uzi;

use Illuminate\Support\Facades\Session;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Core\JWKSet;
use Jose\Component\Encryption\Algorithm\ContentEncryption\A128CBCHS256;
use Jose\Component\Encryption\Algorithm\KeyEncryption\RSAOAEP;
use Jose\Component\Encryption\Compression\CompressionMethodManager;
use Jose\Component\Encryption\Compression\Deflate;
use Jose\Component\Encryption\JWEDecrypter;
use Jose\Component\Encryption\Serializer\CompactSerializer;
use Jose\Component\Encryption\Serializer\JWESerializerManager;
use MinVWS\OpenIDConnectLaravel\Services\JWE\JweDecryptException;
use MinVWS\OpenIDConnectLaravel\Services\JWE\JweDecryptInterface;

class JweDecryptService implements JweDecryptInterface
{
    /**
     * @param JWKSet $decryptionKeySet
     * @param JWESerializerManager $serializerManager
     * @param JWEDecrypter $jweDecrypter
     * phpcs:disable Squiz.Functions.MultiLineFunctionDeclaration.Indent -- waiting for phpcs 3.8.0
     */
    public function __construct(
        protected JWKSet $decryptionKeySet,
        protected JWESerializerManager $serializerManager = new JWESerializerManager([new CompactSerializer()]),
        protected JWEDecrypter $jweDecrypter = new JWEDecrypter(
            new AlgorithmManager([new RSAOAEP()]),
            new AlgorithmManager([new A128CBCHS256()]),
            new CompressionMethodManager([new Deflate()])
        ),
    ) {
    }

    /**
     * phpcs:enable
     * @throws JweDecryptException
     */
    public function decrypt(string $jweString): string
    {
        $jwe = $this->serializerManager->unserialize($jweString);

        // Success of decryption, $jwe is now decrypted
        $success = $this->jweDecrypter->decryptUsingKeySet($jwe, $this->decryptionKeySet, 0);
        if (!$success) {
            throw new JweDecryptException('Failed to decrypt JWE');
        }

        $payload = $jwe->getPayload();
        if ($payload === null) {
            throw new JweDecryptException('Payload of JWE is null');
        }

        // Set the payload in the session so we can use it later
        Session::put('oidc_jwt', $payload);

        return $payload;
    }
}
