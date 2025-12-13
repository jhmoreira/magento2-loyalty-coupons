#Count Orders To Get Discount - Módulo Magento 2
Módulo Magento 2 que gera automaticamente cupons de desconto para clientes com base na quantiade de pedidos concluídos.

##Funcionalidades
Geração automática de cupons após X pedidos finalizados
Integração com SalesRule do Msgento
Armazenamento dos cupons em tabela customizada
Exibição de cupons apenas para clientes logados
Aviso global para o cliente quando algum cupom estiver disponivel para ele

##Utilização
Copie o módulo para app/code/Moreira/CountOrdersToGetDiscount

Rode os seguintes comandos
bin/magento module:enable Moreira_CountOrdersToGetDiscount
bin/magento setup:upgrade
bin/magento setup:di:compile

Acesse o painel do Magento
Vá em:
Stores -> Configuration -> Sales -> Order Discount

Preenche as configurações do módulo

##Objetivo:
Este módulo foi desenvolvido como projeto de portfólio para demonstrar conhecimentos avançados em Magento 2, incluindo observers, models customizados, integração com frontend e regras de negócio reais
