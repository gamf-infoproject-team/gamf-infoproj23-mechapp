export enum MaterialTypeEnum {
  material = 'material',
  service = 'service',
}

export const MaterialTypeToLabelMapping: Record<MaterialTypeEnum, string> = {
  [MaterialTypeEnum.material]: 'Termék',
  [MaterialTypeEnum.service]: 'Szolgáltatás',
}

export function findMatTypeByLabel(label: string): MaterialTypeEnum | undefined {
  for (const key of Object.keys(MaterialTypeToLabelMapping)) {
    if (MaterialTypeToLabelMapping[key as MaterialTypeEnum] === label)
      return key as MaterialTypeEnum;
  }
  return undefined;
}

export function findMatTypeByNumber(matNum: string): MaterialTypeEnum {
  switch (true) {
    case matNum.toString().startsWith('1'): return MaterialTypeEnum.material;
    case matNum.toString().startsWith('6'): return MaterialTypeEnum.service;
    default: return MaterialTypeEnum.material;
  }
}
