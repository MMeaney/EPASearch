SELECT DISTINCT 
SPDOC.[ID]
, SPDOC.[RegNumber]
, SPDOC.[FileClassification]
, SPDOC.[Local Authority]
, SPDOC.[Category]
, SPDOC.[Sub-Category]
, SPDOC.[Modified (Modified)]
, SPDOC.[Content Type]
, SPDOC.[Created (Created)]
, SPDOC.[Name (LinkFilenameNoMenu)]
, SPDOC.[Server Relative URL]
, SPDOC.[Folder URL]
, SPDOC.[Document URL]
, SPDOC.[OwnerId]
FROM [LEAP].[dbo].[SharepointDocument]	SPDOC