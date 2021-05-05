<?php

namespace Dingo\Api\Http\Parser;

use Illuminate\Http\Request;
use Dingo\Api\Contract\Http\Parser;
use Dingo\Api\Exception\BadRequestHttpException;

class Accept implements Parser
{
    /**
     * Standards tree.
     *
     * @var string
     */
    protected $standardsTree;

    /**
     * API subtype.
     *
     * @var string
     */
    protected $subtype;

    /**
     * Default version.
     *
     * @var string
     */
    protected $version;

    /**
     * Default format.
     *
     * @var string
     */
    protected $format;

    /**
     * Create a new accept parser instance.
     *
     * @param string $standardsTree
     * @param string $subtype
     * @param string $version
     * @param string $format
     *
     * @return void
     */
    public function __construct($standardsTree, $subtype, $version, $format)
    {
        $this->standardsTree = $standardsTree;
        $this->subtype = $subtype;
        $this->version = $version;
        $this->format = $format;
    }

    /**
     * Parse the accept header on the incoming request. If strict is enabled
     * then the accept header must be available and must be a valid match.
     *
     * @param \Illuminate\Http\Request $request
     * @param bool                     $strict
     *
     * @throws \Dingo\Api\Exception\BadRequestHttpException
     *
     * @return array
     */
    public function parse(Request $request, $strict = false)
    {
        $pattern = '/application\/'.$this->standardsTree.'\.('.$this->subtype.')\.([\w\d\.\-]+)\+([\w]+)/';

        if (! preg_match($pattern, $request->header('accept'), $matches)) {
            if ($strict) {
                throw new BadRequestHttpException('由于严格匹配过程,Accept header无法正确地被解析.');
            }

            $default = 'application/'.$this->standardsTree.'.'.$this->subtype.'.'.$this->version.'+'.$this->format;

            preg_match($pattern, $default, $matches);
        }

        return array_combine(['subtype', 'version', 'format'], array_slice($matches, 1));
    }
}
