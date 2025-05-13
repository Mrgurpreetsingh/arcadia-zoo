public function up(Schema $schema): void
{
    $this->addSql('CREATE TABLE service (id SERIAL NOT NULL, nom VARCHAR(100) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
    $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
    $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
}