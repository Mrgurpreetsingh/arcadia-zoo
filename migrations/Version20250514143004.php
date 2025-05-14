<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250514143004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Convert date_creation and date_passage to TIMESTAMP';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE review ALTER date_creation TYPE TIMESTAMP(0) WITHOUT TIME ZONE USING date_creation::timestamp(0) without time zone');
        $this->addSql('ALTER TABLE veterinary_report ALTER date_passage TYPE TIMESTAMP(0) WITHOUT TIME ZONE USING date_passage::timestamp(0) without time zone');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE review ALTER date_creation TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE veterinary_report ALTER date_passage TYPE VARCHAR(255)');
    }
}
