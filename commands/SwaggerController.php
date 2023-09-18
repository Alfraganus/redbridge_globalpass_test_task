<?php

namespace app\commands;

use OpenApi\Generator;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class SwaggerController extends Controller
{
    const SCAN_DIRECTORY = "modules";

    /**
     * Генерация документации OpenAPI
     * @return int
     */
    public function actionGenerate()
    {
        $docFile = 'web/swagger/swagger.yaml';

        $this->stdout("Starting documentation generation \n");

        $openApi = Generator::scan([
            Yii::getAlias(self::SCAN_DIRECTORY),
        ]);

        file_put_contents($docFile, $openApi->toYaml());

        $this->stdout("Finished! \r\n", Console::FG_GREEN);

        return ExitCode::OK;
    }
}
